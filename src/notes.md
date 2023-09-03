# Topcis

## Sedning Requests to openFDA

You need to understand what information the openFDA API can give you. How limited are sarches, for example?

Answering this question will also require understanding the syntax of API requests.

The implementation can't be done until you have this understanding. 

## GuzzleHttp\Client query input Examples:

```php
// Associative array of input paramterx
$client->request('GET', '/get', ['query' => ['foo' => 'bar']]);

// a query string in form expected by API.
$client->request('GET', '/get', ['query' => $query_string);
```


