## Income SDK

IncomeSDK is a generic HTTP Requests.

### Initialization

```php
use incomeSDK\Core\Client;

$sdk = new Client(API_KEY);
```

### Create Loan

```php
// result is bool
$result = $sdk->createLoan([
    // ...
]);

if ($result) {
    // Loan created
} else {
    // have errors
    print_r($sdk->getErrors());
}
```



## License
Income-SDK is open source and available under the MIT license.

## Contributing
Pull requests and issues are welcome. Please see [CONTRIBUTING.md](./CONTRIBUTING.md) for more details.
