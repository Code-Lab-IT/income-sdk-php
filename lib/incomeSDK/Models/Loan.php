<?php

namespace incomeSDK\Models;

use incomeSDK\Core\BaseModel;

/**
 * @property int|null $income_loan_id
 * @property int|null $loan_id
 * @property string|null $type
 * @property string|null $country
 * @property string|null $currency
 * @property string|null $status
 * @property string|null $schedule_type
 * @property string|null $cashflow_type
 * @property float|null $interest_rate
 * @property float|null $apr
 * @property int|null $skin_in_the_game
 * @property float|null $issued_amount
 * @property float|null $list_amount
 * @property float|null $repaid_amount
 * @property float|null $debt_amount
 * @property float|null $saldo
 * @property string|null $purpose
 * @property string|null $issued_date
 * @property float|null $remaining_principal
 * @property string|null $paid_out_date
 *
 * @property string|null $term_date
 * @property string|null $due_date
 * @property string|null $list_datetime
 * @property bool|null $buyback_guarantee
 * @property bool|null $extendable_schedule
 * @property string|null $borrower_name
 * @property int|null $period
 * @property float|null $borrower_interest
 * @property string|null $timezone
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
