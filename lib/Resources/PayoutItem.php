<?php
/**
 * WARNING: Do not edit by hand, this file was generated by Crank:
 *
 * https://github.com/gocardless/crank
 */

namespace GoCardlessPro\Resources;

/**
 * A thin wrapper around a payout_item, providing access to its
 * attributes
 *
 * @property-read $amount
 * @property-read $links
 * @property-read $type
 */
class PayoutItem extends BaseResource
{
    protected $model_name = "PayoutItem";

    /**
     * The positive (credit) or negative (debit) value of the item, in
     * fractional currency;
     * the lowest denomination for the currency (e.g. pence in GBP, cents in
     * EUR), to one decimal place.
     * <p class="notice">For accuracy, we store some of our fees to greater
     * precision than we can actually pay out (for example, a GoCardless fee we
     * record might come to 0.5 pence, but it is not possible to send a payout
     * via bank transfer including a half penny).<br><br>To calculate the final
     * amount of the payout, we sum all of the items and then round to the
     * nearest currency unit.</p>
     */
    protected $amount;

    /**
     * 
     */
    protected $links;

    /**
     * The type of the credit (positive) or debit (negative) item in the payout.
     * One of:
     * <ul>
     * <li>`payment_paid_out` (credit)</li>
     * <li>`payment_failed` (debit): The payment failed to be processed.</li>
     * <li>`payment_charged_back` (debit): The payment has been charged
     * back.</li>
     * <li>`payment_refunded` (debit): The payment has been refunded to the
     * customer.</li>
     * <li>`refund` (debit): <em>private beta</em> A refund sent to a customer,
     * not linked to a payment.</li>
     * <li>`refund_funds_returned` (credit): The refund could not be sent to the
     * customer, and the funds have been returned to you.</li>
     * <li>`gocardless_fee` (credit/debit): The fees that GoCardless charged for
     * a payment. In the case of a payment failure or chargeback, these will
     * appear as credits.</li>
     * <li>`app_fee` (credit/debit): The optional fees that a partner may have
     * taken for a payment. In the case of a payment failure or chargeback,
     * these will appear as credits.</li>
     * <li>`revenue_share` (credit/debit): A share of the fees that GoCardless
     * collected which some partner integrations receive when their users take
     * payments. Only shown in partner payouts. In the case of a payment failure
     * or chargeback, these will appear as credits.</li>
     * <li>`surcharge_fee` (credit/debit): GoCardless deducted a surcharge fee
     * as the payment failed or was charged back, or refunded a surcharge fee as
     * the bank or customer cancelled the chargeback.</li>
     * </ul>
     */
    protected $type;

}
