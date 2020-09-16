<?php

namespace incomeSDK\Models;

use incomeSDK\Core\BaseModel;

/**
 * @property int $id
 * @property int|null $loan_id
 * @property int|null $loan_type
 * @property float $loan_amount
 * @property float $remaining_principal
 * @property float $effective_apr
 * @property float $interest
 * @property int $country_id
 * @property int $type_id
 * @property int $currency_id
 * @property string|null $issued_date
 * @property string|null $list_date
 * @property string|null $due_date
 * @property float $list_amount
 * @property int|null $skin
 * @property float $repaid_amount
 * @property float $debt_amount
 * @property int $schedule_type_id
 * @property float $borrower_interest
 * @property int $loan_type_id
 */
class Loan extends BaseModel
{

}
