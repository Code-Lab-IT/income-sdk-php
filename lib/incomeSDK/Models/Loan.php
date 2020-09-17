<?php

namespace incomeSDK\Models;

use incomeSDK\Core\BaseModel;

/**
 * @property int|null $income_loan_id
 * @property int|null $loan_id
 * @property string|null $type
 * @property string|null $country
 * @property string|null $schedule_type
 * @property string|null $cashflow_type
 * @property string|null $currency
 * @property float|null $interest_rate
 * @property float|null $apr
 * @property int|null $skin_in_the_game
 * @property float|null $issued_amount
 * @property float|null $list_amount
 * @property float|null $repaid_amount
 * @property float|null $debt_amount
 * @property float|null $unpaid_invoiced_amount
 * @property float|null $saldo
 * @property float|null $debt_saldo
 * @property float|null $ep_saldo
 * @property float|null $pp_saldo
 * @property float|null $add_fee_left
 * @property string|null $purpose
 * @property string|null $issued_date
 * @property string|null $status
 * @property float|null $remaining_principal
 * @property string|null $paid_out_date
 *
 * @property string|null $term_date
 * @property string|null $due_date
 * @property string|null $list_datetime
 * @property string|null $overdue_base_date
 * @property string|null $invoice_status
 * @property string|null $next_payment_date
 * @property int|null $all_payments_count
 * @property int|null $paid_invoices_count
 * @property int|null $approximately_paid_invoices_count
 * @property int|null $in_debt_invoices_count
 * @property bool|null $buyback_guarantee
 * @property bool|null $extendable_schedule
 * @property string|null $borrower_name
 * @property int|null $period
 * @property float|null $interest
 * @property float|null $borrower_interest
 * @property float|null $admission_fee
 * @property float|null $monthly_fee
 * @property int|null $media_source
 * @property string|null $collection_paused_date
 * @property string|null $print_date
 * @property string|null $contract_delivery_date
 * @property string|null $contract_received_date
 * @property string|null $sub_status
 * @property string|null $sub_status_valid_until
 * @property string|null $created
 *
 * @property LoanSchedule|null $loan_schedule
 */
class Loan extends BaseModel
{
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->data['loan_schedule'] = new LoanSchedule($this->data['loan_schedule']);
    }

    /**
     * @param $loansArray
     * @return array
     */
    public static function createListFromArray($loansArray): array
    {
        $loansList = [];

        if (!empty($loansArray) && is_array($loansArray)) {
            foreach ($loansArray as $item) {
                $loansList[] = new Loan($item);
            }
        }

        return $loansList;
    }
}
