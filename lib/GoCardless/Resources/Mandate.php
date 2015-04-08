<?php
/**
  * WARNING: Do not edit by hand, this file was generated by Crank:
  *
  * https://github.com/gocardless/crank
  */

namespace GoCardless\Resources;

/**
  *  Mandates represent the Direct Debit mandate with a
  *  [customer](https://developer.gocardless.com/pro/#api-endpoints-customers).

  *   *  
  *  GoCardless will notify you via a
  *  [webhook](https://developer.gocardless.com/pro/#webhooks) whenever the
  *  status of a mandate changes.
  */
class Mandate
{

    private $data;
    private $response;

    public function __construct($data, $response = null)
    {
        if ($data === null) {
            throw new \Exception('Data cannot be null');
        }
        $this->response = $response;
        $this->data = $data;
    }

    public function created_at()
    {
        return $this->data->created_at;
    }

    public function id()
    {
        return $this->data->id;
    }

    public function links()
    {
        return $this->data->links;
    }

    public function metadata()
    {
        return $this->data->metadata;
    }

    public function next_possible_charge_date()
    {
        return $this->data->next_possible_charge_date;
    }

    public function reference()
    {
        return $this->data->reference;
    }

    public function scheme()
    {
        return $this->data->scheme;
    }

    public function status()
    {
        return $this->data->status;
    }

    public function response()
    {
        return $this->response;
    }
    public function __toString()
    {
        $ret = 'Mandate Class (';
        $ret .= print_r($this->data, true) . ')';
        return $ret;
    }
}
