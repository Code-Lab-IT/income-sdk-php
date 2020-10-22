# API Documentation

## Authorization

All API requests require the use of a generated API key. You can request your manager to generate API key.

To authenticate an API request, you should provide your API key in the `GET` parameter by appending the `api_key=[API_KEY]`.

## Requests

API using REST architecture.

**Base URL:** `https://income-backoffice.code-lab.it/lo-api/`  

## Methods list

* [Create Loan](./create_loan.md)
* [View Loan](./view_loan.md)
* [Loans List](./loans_list.md)
* [Update loan Schedule](./update_loan_schedule.md)
* [Buyback Loan](./buyback_loan.md)
* [View Buyback Loans List](./buyback_loans_list.md)


## Responses

Many API endpoints returns a JSON response in the following format:

**Success response**

```json
{
  "success" : true,
  "data": {
    .. data
  }
}
```

**Error response**

```json
{
  "success": false,
  "message": "Loan is not valid",
  "errors": {
    "loan_schedule": "Schedule component \"capitalDebInterest\" not found in payments. Rowno: 1"
  },
  "status_code": 422
}
```