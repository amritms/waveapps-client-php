# WaveApps Client PHP

A wrapper to use the [WaveApps][wave-apps]'s graphql api in your laravel SaaS application. This repo can manage webapps account on behalf of third party users.

**Note:** If you are looking to use waveapps on behalf of a single user then use [subbe/waveapp][subbe-waveapp]

The original documentation is available at:
- [Wave - Developer Portal][wave-documentation-url]
- [API Reference][wave-api-schema]
- [API Playground][wave-api-playground]

To use WaveApps, you will need to [register][wave-create-an-app] on the developer portal.
And create new application and fetch client_id, client_secret

## Requirement & Install
Open you composer.json file and add
```
"amritms/waveapps-client-php":"0.1"
```
and go to the location of your composer file in terminal and run
```
composer update

php artisan vendor:publish
```
## Route
```route
Route::post('webapps/token', 'WebappsController@handleToken');
```

Update your .env file to include
```
WAVE_CLIENT_ID=
WAVE_CLIENT_SECRET=
WAVE_GRAPHQL_AUTH_URI=https://api.waveapps.com/oauth2/token/
WAVE_GRAPHQL_URI=https://gql.waveapps.com/graphql/public
```



### Queries

- user
- countries
- country
- customers
- products
- invoices
- businesses
- business
- currencies
- currency
- accountTypes
- accountSubyypes

### Mutations
**Customer**
- customerCreate
- customerPatch
- customerDelete

**Account**
- accountCreate
- accountPatch
- accountArchive

**Product**
- productCreate
- productPatch
- productArchive

**Sales**
- salesTaxCreate
- salesTaxPatch
- salesTaxRateCreate
- salesTaxArchive

**Money Transaction**
- moneyTransactionCreate

**Invoice**
- invoiceCreate
- invoiceDelete
- invoiceSend
- invoiceApprove
- invoiceMarkSent

### How to use

#### Query
```
$waveapp = new \Amritms\WaveappsClientPhp\Waveapps();
$countries = $waveapp->countries();

--- OR ---

$country = $waveapp->country(['code' => 'US']);
```

#### Mutation
```
$waveapp = new \Amritms\WaveappsClientPhp\Waveapps();
$customer = [
    "input" => [
        "businessId" => "<REPLACE-THIS-WITH-THE-BUSINESS-ID>",
        "name" => "Lucifer Morningstar",
        "firstName" => "Lucifer",
        "lastName" => "Morningstar",
        "displayId" => "Lucifer",
        "email" => "lucifer.morningstar@hell.com",
        "mobile" => "6666666",
        "phone" => "6666666",
        "fax" => "",
        "address" => [
            "addressLine1" => "666 Diablo Street",
            "addressLine2" => "Hell's Kitchen",
            "city" => "New York",
            "postalCode" => "10018",
            "countryCode" => "US"
        ],
        "tollFree" => "",
        "website" => "",
        "internalNotes" => "",
        "currency" => "USD",
        "shippingDetails" => [
            "name" => "Lucifer",
            "phone" => "6666666",
            "instructions" => "pray",
            "address" => [
                "addressLine1" => "666 Diablo Street",
                "addressLine2" => "Hell's Kitchen",
                "city" => "New York",
                "postalCode" => "10018",
                "countryCode" => "US"
            ]
        ]
    ]
];

$newCustomer = $waveapp->customerCreate($customer, "CustomerCreateInput");
```

**Note:** This repo is based on [subbe/waveapp][subbe-waveapp]

[wave-apps]: https://www.waveapps.com/
[wave-documentation-url]: https://developer.waveapps.com/hc/en-us/categories/360001114072
[wave-api-schema]: https://developer.waveapps.com/hc/en-us/articles/360019968212-API-Reference
[wave-api-playground]: https://developer.waveapps.com/hc/en-us/articles/360018937431-API-Playground
[wave-create-an-app]: https://developer.waveapps.com/hc/en-us/sections/360003012132-Create-an-App
[subbe-waveapp]:https://github.com/subbe/waveapp
