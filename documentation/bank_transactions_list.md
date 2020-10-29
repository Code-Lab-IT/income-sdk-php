# View Bank Transactions

`Date from` and `Date to` format: `Y-m-d`

```http
GET /loans/bank-transfer?api_key=12345678901234567890123456789012&date_from=2019-01-01&date_to=2020-12-12
```

## Success response

```json
{
  "success": true,
  "data": [
    {
      "event_uuid": "2020102713534746878700-1f7444d0-ed97-4bec-a4ea-79c562f703ca",
      "amount": 20385.92,
      "description": "LIQUIDACAO DE COBRANCA Valor Disponivel",
      "date": null,
      "bankTransactionId": "4006026"
    },
    {
      "event_uuid": "2020102713534749764900-cd7eac39-4241-4d19-92c1-46f6fbae68e0",
      "amount": 387.86,
      "description": "DOC CREDITO AUTOMATICO* SANDRA RIBEIRO",
      "date": null,
      "bankTransactionId": "743231"
    }
  ]
}
```