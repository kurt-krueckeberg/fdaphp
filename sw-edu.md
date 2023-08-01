# Swoole Education

## Overview

According to [Get Started with Open Swoole](https://openswoole.com/docs/get-started-swoole):

> Open Swoole is released as a PHP PECL (PHP Extension Community Library) extension (written in C++) and runs as a PHP CLI application,
simply by running `$ php server.php`. 

So it doesn't even need a web server like Apache or Nginx or evenphp8.1-fpm running. According to 
[How Open Swoole works](https://openswoole.com/how-it-works):

> You can either run OpenSwoole directly on your network or use Apache or Nginx with a proxy pass through setup to accept requests.
OpenSwoole simplifies the PHP server setup as you don't need to run a separate HTTP server, it is all handled at the PHP level,
replacing the need for PHP-FPM.

## Learning Swoole

Here are two older basic articles explaining what it is:

- [Creating a Basic PHP Web Server With Swoole](https://www.zend.com/blog/creating-basic-php-web-server-swoole)
- [PHP Basics: What Is Swoole?](https://www.zend.com/blog/swoole)

Youtube:

[PHP Swoole Tutorials](https://www.youtube.com/watch?v=fZfZsUeleiA&list=PLYWCHRaNLGT-55hyJ0y9g7O8B0N8QrBmr)

PHP.net [Swoole Classes and Functions documentation](https://www.php.net/manual/en/intro.swoole.php).

### Extensive Examples and Guide

- [Swoole by Examples](https://github.com/deminy/swoole-by-examples)

## Using Swoole in a Project

```bash
composer require openswoole/core:22.1.2
```

## Using Curl

See [Enabling coroutine support for the CURL library (libcurl)](https://openswoole.com/docs/runtime-hooks/swoole-hook-native-curl)

## Use with MySQL

<https://openswoole.com/docs/modules/swoole-coroutine-mysql>


