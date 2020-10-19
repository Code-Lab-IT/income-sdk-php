# View Loan List

`Date from` and `Date to` format: `Y-m-d`

```http
GET /loans/buyback?api_key=12345678901234567890123456789012&date_from=2019-01-01&date_to=2020-12-12
```

## Success response

```json

{
  "success": true,
  "data": [
    {
      "loan_id": 161791,
      "income_loan_id": 100001,
      "reason": "Borrower paid back",
      "amount": 100,
      "intrest_amount": 100
    },
    {
      "loan_id": 161791,
      "income_loan_id": 100002,
      "reason": "Borrower paid back",
      "amount": 98,
      "intrest_amount": 98
    }
  ]
}
```