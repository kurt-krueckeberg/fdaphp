# Swoole

## Overview

What is Swoole or Open Swoole? [Get Started with Open Swoole](https://openswoole.com/docs/get-started-swoole) says:

> Open Swoole is released as a PHP PECL (PHP Extension Community Library) extension (written in C++) and runs as a PHP CLI application,
simply by running `$ php server.php`. 

So it doesn't even need a web server like Apache or Nginx or evenphp8.1-fpm running. According to 
[How Open Swoole works](https://openswoole.com/how-it-works):

> You can either run OpenSwoole directly on your network or use Apache or Nginx with a proxy pass through setup to accept requests.
OpenSwoole simplifies the PHP server setup as you don't need to run a separate HTTP server, it is all handled at the PHP level,
replacing the need for PHP-FPM.

Here are two older basic articles explaining what it is:

- [Creating a Basic PHP Web Server With Swoole](https://www.zend.com/blog/creating-basic-php-web-server-swoole)
- [PHP Basics: What Is Swoole?](https://www.zend.com/blog/swoole)

Youtube:

[PHP Swoole Tutorials](https://www.youtube.com/watch?v=fZfZsUeleiA&list=PLYWCHRaNLGT-55hyJ0y9g7O8B0N8QrBmr)

PHP.net [Swoole documentation](https://www.php.net/manual/en/intro.swoole.php).

Open Swoole documentation [link](https://openswoole.com/docs)

## Installation of Open Swoole

### Suggested PHP extensions:

- curl
- json
- bcmath
- mbstring
- opcache
- xml
- zip

### Installing Open Swoole with Pecl

Open Swoole [prequisties](https://openswoole.com/docs/get-started/prerequisites):

These apt packages:

- openssl
- libssl-dev
- curl
- libcurl4-openssl-dev
- libpcre3-dev
- build-essential

**Note:** Using g++ 13 will results in compile errors. Version 12 does work.

Per <https://openswoole.com/docs/get-started/installation>:

```bash
sudo pecl install -D 'enable-sockets="yes" enable-openssl="yes" enable-http2="yes" enable-mysqlnd="no" enable-hook-curl="yes" enable-cares="yes" with-postgres="no"' openswoole
```

The build of `openswoole.so` and concluded with:

```
Build process completed successfully
Installing '/usr/lib/php/20210902/openswoole.so'
Installing '/usr/include/php/20210902/ext/openswoole/config.h'
Installing '/usr/include/php/20210902/ext/openswoole/php_openswoole.h'
install ok: channel://pecl.php.net/openswoole-22.0.0
configuration option "php_ini" is not set to php.ini location
You should add "extension=openswoole.so" to php.ini
```

Next, you must manually add "extension=openswoole.so" to php.ini. I did this:

The curl extension must load before swoole, so I did this:

1. Created `openswoole.ini` in `/etc/php/8.1/mods-available/openswoole.ini` with this content

```ini
; priority=25
extension=openswoole.so
```

2. Create symbolic links in `/etc/php/8.1/cli/conf.d`  called `25-swoole.ini` that refers to
`/etc/php/8.1/mods-available/swoole.ini`:

```bash
cd /etc/php/8.1/cli/conf.d

sudo ln -s /etc/php/8.1/mods-available/openswoole.ini 25-openswoole.ini
```

**Note:** You don't need to enable to php8.X-fpm swoole extensions, unless you plan to use php8.X-fpm.
As mentioned at the beginning, it is not needed: the swoole server(s) run as a PHP CLI app. So this is
**NOT needed**:

```bash
cd /etc/php/8.1/fpm/conf.d   <--- Not needed
sudo ln -s /etc/php/8.1/mods-available/openswoole.ini 25-openswoole.ini
sudo systemctl restart php8.1-fpm
systemctl status php8.1-fpm
```

Check that `openswoole` was installed:

```
$ php -m | grep openswoole
```

```bash
composer require openswoole/core:22.1.2
```

## Making Curl Calls

See [Enabling coroutine support for the CURL library (libcurl)](https://openswoole.com/docs/runtime-hooks/swoole-hook-native-curl)

## Use with MySQL

<https://openswoole.com/docs/modules/swoole-coroutine-mysql>

## Open Swoole Documentation

<https://openswoole.com/docs/swoole-get-started#server>
