# Create Loan

```http
POST '/loans/store?api_key=12345678901234567890123456789012'
```

**Body**

```json
{
  "loan": {
    "apr": "219.9",
    "type": "SHORT",
    "country": "BRA",
    "loan_id": "161791",
    "purpose": "Furniture",
    "currency": "BRL",
    "timezone": "America/Fortaleza",
    "list_date": "2020-09-30",
    "debt_amount": "0",
    "issued_date": "2020-07-06",
    "list_amount": "16.7",
    "interest_rate": "178.19",
    "issued_amount": "1000",
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
            "schedule_components": {
              "capital": "principal",
              "interest": "interest",
              "capitalDebtInterest": "interest"
            },
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
          "capitalDebInterest": 0
        },
        {
          "date": "2020-09-08",
          "rowno": "2",
          "capital": 145.12,
          "interest": 77.14,
          "repayment": {
            "total": 0,
            "repaid": false,
            "payments": []
          },
          "capitalDebInterest": 0
        }
      ]
    },
    "repaid_amount": "133.26",
    "schedule_type": "INTEREST_ONLY",
    "skin_in_the_game": "20",
    "buyback_guarantee": true,
    "extendable_schedule": true
  }
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