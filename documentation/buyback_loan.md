# Buyback Loan

```http
POST '/loans/buyback?api_key=12345678901234567890123456789012'
```

**Body**

```json
{
    "loan_id": 100040,
    "reason": "Borrower paid back"
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
          "date": "2021-09-04",
          "rowno": "1",
          "capital": "200.11",
          "interest": "2.21",
          "capitalDebInterest": 11.01,
          "repayment": {
            "total": 213.33,
            "repaid": true,
            "payments": [
              {
                "date": "2020-09-01",
                "capital": 200.11,
                "interest": 2.21,
                "capitalDebInterest": 11.01
              }
            ]
          }
        }
      ],
      "schedule_components": {
        "capital": "principal",
        "interest": "interest",
        "capitalDebInterest": "interest"
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