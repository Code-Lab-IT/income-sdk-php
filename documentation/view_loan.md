# View Loan

`[ID]` - you can use your `loan_id` or `income_loan_id`

```http
GET /loans/view/[ID]?api_key=12345678901234567890123456789012'
```

## Error response

```json
{
  "success": false,
  "message": "Loan not found",
  "status_code": 404
}
```

## Success response

```json
{
  "success": true,
  "data": {
    "income_loan_id": 100001,
    "loan_id": 161791,
    "type": "CAR",
    "country": "",
    "schedule_type": "",
    "cashflow_type": "",
    "interest_rate": "178.19000",
    "apr": "219.900",
    "skin_in_the_game": 20,
    "loan_schedule": {
      "schedule": [
        {
          "date": "2020-08-06",
          "rowno": "1",
          "capital": 133.26,
          "interest": 89,
          "repayment": {
            "total": 222.26,
            "repaid": true,
            "payments": [
              {
                "date": "2020-08-05",
                "total": 222.26,
                "capital": 133.26,
                "interest": 89,
                "capitalDebtInterest": 0
              }
            ]
          },
          "capitalDebtInterest": 0
        },
        {
          "date": "2020-09-08",
          "rowno": "2",
          "capital": 145.12,
          "interest": 77.14,
          "repayment": {
            "total": 0,
            "repaid": false
          },
          "capitalDebtInterest": 0
        }
      ],
      "schedule_components": {
        "capital": "principal",
        "interest": "interest",
        "capitalDebtInterest": "interest"
      }
    },
    "currency": "BRL",
    "status": "Current",
    "issued_date": "2020-07-06",
    "list_datetime": "2020-10-19 15:39:10",
    "issued_amount": "1000.00",
    "list_amount": "16.70",
    "repaid_amount": "133.26",
    "debt_amount": "0.00",
    "extendable_schedule": 1,
    "purpose": "Furniture",
    "buyback_guarantee": 1,
    "saldo": "13.00",
    "remaining_principal": "21.00",
    "paid_out_date": null,
    "term_date": "2020-09-17",
    "due_date": "2020-09-19",
    "borrower_name": "test",
    "period": 5,
    "borrower_interest": "11.50000",
    "timezone": "America\/Fortaleza",
    "created": "2020-10-19 15:39:10"
  }
}
```