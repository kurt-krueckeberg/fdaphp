# Installation of Open Swoole

## Suggested PHP extensions to first have installed:

- curl
- json
- bcmath
- mbstring
- opcache
- xml
- zip

## Installing Open Swoole with Pecl

As stated in Open Swoole [prequisties](https://openswoole.com/docs/get-started/prerequisites). These Ubuntu or Debian apt packages must first be installed:

- openssl
- libssl-dev
- curl
- libcurl4-openssl-dev
- libpcre3-dev
- build-essential

> [!NOTE]
> Using g++ 13 will results in compile errors. Version 12 does work.
> 
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
