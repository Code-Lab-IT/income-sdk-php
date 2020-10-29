# Post Bank Export Data

```http
POST '/loans/bank-transfer?api_key=12345678901234567890123456789012'
```

**Body**

```json
{
  "bankExportData": [
    {
      "account": "109203920394",
      "transactions": [
        {
          "event_uuid": "2020102713534749764900-cd7eac39-4241-4d19-92c1-46f6fbae68e0",
          "amount": 331.22,
          "bankTransactionId": "1234567890",
          "date": 20201001,
          "distribution": [
            {
              "amount": 300.22,
              "loan_distribution": {
                "interest": 44.1,
                "monthly_fee": 10,
                "principal": 246.12
              },
              "loan_id": 100001,
              "type": "borrower repayment"
            }
          ],
          "optional_description": "For loan no 1088322",
          "optional_reference_number": 10883222,
          "optional_senderAccount": "032934023523402394",
          "optional_senderBank": "Bradesco",
          "optional_senderBankCode": "BR23AA",
          "optional_senderName": "Marguerita Consuela"
        }
      ]
    }
  ]
}
```

**Required parameters**

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `api_key` | `string` | **Required**. Your Income API key |
| `loan_id` | `string` | **Required** Your loan ID |,
| `country` | `string` | **Required** |,
| `type` | `string` | **Required** |,
| `currency` | `string` | **Required** |,
| `status` | `string` | **Required** |,
| `issued_date` | `date` | **Required** Format Y-m-d |,
| `list_date` | `date` | **Required** Format Y-m-d |,
| `issued_amount` | `numeric` | **Required** |,
| `list_amount` | `numeric` | **Required** |,
| `skin_in_the_game` | `numeric` | **Required** 0 - 100 |,
| `repaid_amount` | `numeric` | **Required** |,
| `debt_amount` | `numeric` | **Required** |,
| `schedule_type` | `string` | **Required** |,
| `interest_rate` | `numeric` | **Required** 0 - 100 |,
| `apr` | `numeric` | **Required** |,
| `extendable_schedule` | `boolean` | **Required** |,
| `purpose` | `string` | **Required** |,
| `buyback_guarantee` | `boolean` | **Required** |,
| `saldo` | `numeric` | **Required** |,
| `remaining_principal` | `numeric` | **Required** |,
| `term_date` | `date` | **Required** Format Y-m-d |,
| `due_date` | `date` | **Required** Format Y-m-d |,
| `borrower_name` | `string` | **Required** |,
| `period` | `numeric` | **Required** |,
| `borrower_interest` | `numeric` | **Required** |,
| `timezone` | `string` | **Required** |,

## Success response

```json
{
  "success": true,
  "data": {
    "message": "Loan listed",
    "income_loan_id": 100001
  }
}
```