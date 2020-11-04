## Income SDK

IncomeSDK is meant to exchange information between your application and Income backend. 

## Installation

To include the SDK in your project, download the SDK via composer: 

```bash
composer require income/income-sdk-php
```


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

## REST API Documentation
Pull requests and issues are welcome. Please see [https://github.com/Code-Lab-IT/Income-API-Documentation](https://github.com/Code-Lab-IT/Income-API-Documentation) for more details.
