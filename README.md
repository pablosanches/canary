# ![logo](https://i.imgur.com/pI9L4Ly.png) Canary

Canary is a simple mail queuing and management

[![Build Status](https://travis-ci.org/pablosanches/canary.svg?branch=master)](https://travis-ci.org/pablosanches/canary)
[![CodeClimate](http://img.shields.io/codeclimate/github/pablosanches/canary.svg?style=flat)](https://codeclimate.com/github/pablosanches/canary)
[![Version](http://img.shields.io/packagist/v/pablosanches/canary.svg?style=flat)](https://packagist.org/packages/pablosanches/canary)

## Requirements

* PHP >= 5.6

## Install

### Composer

```json
{
    "require": {
        "pablosanches/canary": "1.0.*"
    }
}
```

## Usage

```php
use Canary\Mailer;

$mailer = new Mailer();

$mailer->attach($mail); // PHPMailer instance
$mailer->attach($mail2); // PHPMailer instance

if (!$mailer->send()) {
    $errors = $mailer->getErrors();
}
```

## Tests

On project directory:

* `composer install` to retrieve `phpunit`
* `composer tests` to run tests
