# Notes

## Guzzle and Query Strings

[Guzzle and Query String](https://docs.guzzlephp.org/en/stable/quickstart.html#query-string-parameters):

You can provide query string parameters with a request in several ways.

1. You can set query string parameters in the request's URI:

`$response = $client->request('GET', 'http://httpbin.org?foo=bar');`

2. You can specify the query string parameters using the query request option as an array.

```php
$client->request('GET', 'http://httpbin.org', [ 'query' => ['foo' => 'bar'] ]);
```

3. Providing the option as an array will use PHP's `http_build_query` function to format the query string.

And finally, you can provide the query request option as a string.

```phhp
$client->request('GET', 'http://httpbin.org', ['query' => 'foo=bar']);
```



## Using PHP `getopts()` to Process Command Line Arguments

See:

- Good intro: [Parsing Argument Using Getopt in C/C++](https://leimao.github.io/blog/Argument-Parser-Getopt-C/)
- Question about how to use it [answered](https://stackoverflow.com/questions/13251732/how-to-specify-an-optstring-in-the-getopt-function)
- [`getopt()` C Library Function](https://www.man7.org/linux/man-pages/man3/getopt.3.html)

## New PHP 8.2 Features

Currently there is no a lunar PPA for PHP 8.2.

[8.2 Features](https://kinsta.com/blog/php-8-2/)

## Existing PHP OpenFda PHP Github Code

[laravel-openfda](https://github.com/MeisamMulla/laravel-openfda) has a fundametnal class that encapsulates the functionality of query API call 
and its five openFDA query parameters. So this encapsulates succintly what the openFDA API does. Its Endpoints class or interface can probably be 
re-worked using an Enum, maybe an interface backed Enum?

```php
$query->search($srch)->limit($l)->?skip($s)->?count();
```

## Tyepsense

PHP Typesense [tutorial-like example](https://aviyel.com/post/1325/getting-started-with-php-api-clients-on-typesense)

## Parser

Maybe a generic pasers, maybe in PHP, will be useful in the implementation? Or a parse I can generate, maybe some sort of CLI parameters parser?

- [TNTSearch](https://github.com/teamtnt/tntsearch) is a full-text search (FTS) engine written entirely in PHP. It could help highlight? OR maybe
I could download all the JSON openFDA LASIK data, sort it in a DB and then search it?


