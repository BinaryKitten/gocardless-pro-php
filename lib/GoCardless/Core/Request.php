<?php

namespace GoCardless\Core;

class Request
{
    private $httpClient;
    private $envelopeKey;

    private static $paramsMethods = array('get', 'delete');
    private static $bodyMethods   = array('post', 'put');

    public function __construct($httpClient, $envelopeKey)
    {
        $this->httpClient = $httpClient;
        $this->envelopeKey = $envelopeKey;
    }

    public function run($method, $path, $options = array())
    {
        $method = strtolower($method);
        $postBody = null;

        if (in_array($method, self::$paramsMethods)) {
            $urlParams = http_build_query($options);
            if (substr($path, -1) === '?' || substr($path, -1) === '&') {
                $path = $path . $urlParams;
            } elseif (strstr($path, '?') !== false) {
                $path = $path . '&' . $urlParams;
            } else {
                $path = $path . '?' . $urlParams;
            }
        } elseif (in_array($method, self::$bodyMethods)) {
            $postBody = json_encode(array($this->envelopeKey => $options));
        } else {
            throw new ClientUsageError('Unsupported HTTP Method');
        }

        $responseData = $this->httpClient->runCurlRequest($method, $path, $postBody);

        $response = new Response($responseData['body'], $responseData['status'], $responseData['content-type']);

        // Required for JSON response types.
        $response->setUnwrapJson($this->envelopeKey);
        return $response;
    }
}
