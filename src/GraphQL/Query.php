<?php


namespace Amritms\WaveappsClientPhp\GraphQL;


class Query
{
    public static function user()
    {
        return <<<GQL
query { user { id defaultEmail firstName lastName createdAt modifiedAt } }
GQL;
    }

    public static function countries()
    {
        return <<<GQL
query { countries { code name currency { code symbol name plural exponent } nameWithArticle provinces { code name } } }
GQL;
    }

    public static function country()
    {
        return <<<GQL
query(\$code: CountryCode!) { country(code: \$code) { code name currency { code symbol name plural exponent } nameWithArticle provinces { code name } } }
GQL;
    }

    public static function businesses()
    {
        return <<<GQL
query(\$page: Int!, \$pageSize: Int!) { businesses(page: \$page, pageSize: \$pageSize) { edges { node { id name isPersonal organizationalType type { name value } subtype { name value } currency { code symbol name plural exponent } timezone address { addressLine1 addressLine2 city province { code name slug } country { code name currency { code symbol name plural exponent } nameWithArticle } postalCode } phone fax mobile tollFree website isClassicAccounting isClassicInvoicing isArchived createdAt modifiedAt } } pageInfo { currentPage totalPages totalCount } } }
GQL;
    }

    public static function business()
    {
        return <<<GQL
query(\$id: ID!) { business(id: \$id) { id name isPersonal organizationalType type { name value } subtype { name value } currency { code symbol name plural exponent } timezone address { addressLine1 addressLine2 city province { code name slug } country { code name currency { code symbol name plural exponent } nameWithArticle } postalCode } phone fax mobile tollFree website isClassicAccounting isClassicInvoicing isArchived createdAt modifiedAt } }
GQL;
    }

    public static function currencies()
    {
        return <<<GQL
query { currencies { code symbol name plural exponent } }
GQL;
    }

    public static function currency()
    {
        return <<<GQL
query(\$code: CurrencyCode!) { currency(code: \$code) { code symbol name plural exponent } }
GQL;
    }

    public static function accountTypes()
    {
        return <<<GQL
query { accountTypes { name normalBalanceType value } }
GQL;
    }

    public static function accountSubtypes()
    {
        return <<<GQL
query { accountSubtypes { name value type { name normalBalanceType value } } }
GQL;
    }

    public static function customerExists() {
        return <<<GQL
query(\$businessId: ID!, \$customerId: ID!) { business(id: \$businessId) {  customer(id: \$customerId) { id name } } }
GQL;
    }

    public static function products(){
        return <<<GQL
        query (\$businessId: ID!, \$page: Int!, \$pageSize: Int!) { business(id: \$businessId) { id products(page: \$page, pageSize: \$pageSize, isArchived: false, sort: [NAME_ASC]) { pageInfo { currentPage totalPages totalCount } edges { node { id name description unitPrice isSold isBought createdAt } } } } }
GQL;
    }

    public static function customers(){
        return <<<GQL
query (\$businessId: ID!){ business(id: \$businessId) { id customers(page: 1, pageSize: 20, sort: [NAME_ASC]) { pageInfo { currentPage totalPages totalCount } edges { node { id name email } } } } }
GQL;
    }

    public static function invoices() {
        return <<<GQL
query(\$businessId: ID!, \$page: Int!, \$pageSize: Int!) { business(id: \$businessId) {id isClassicInvoicing invoices(page: \$page, pageSize: \$pageSize) { pageInfo { currentPage totalPages totalCount } edges { node { id createdAt modifiedAt pdfUrl viewUrl status title subhead invoiceNumber invoiceDate poNumber customer { id name } currency { code } dueDate amountDue { value currency {symbol } } amountPaid { value currency { symbol } } total { value currency { symbol } } footer memo itemTitle unitTitle priceTitle amountTitle items { product { id name } description quantity price subtotal { value currency { symbol } } total { value currency {symbol } } } lastSentAt lastSentVia lastViewedAt } } } } }
GQL;
    }
}
