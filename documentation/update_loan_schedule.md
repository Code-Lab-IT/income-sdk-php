# Update loan Schedule

`[ID]` - you can use your `loan_id` or `income_loan_id`

```http
PATCH '/loans/update-schedule/[ID]?api_key=12345678901234567890123456789012'
```

**Body**

```json
{
  "loan_schedule": {
    "schedule": [
      {
        "date": "2021-09-04",
        "rowno": "1",
        "schedule_components": {
          "capital": "principal",
          "interest": "interest",
          "capitalDebInterest": "interest"
        },
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
    ]
  }
}
```

## Success response

```json
{
  "success": true,
  "data": "Loan schedule updated"
}
```