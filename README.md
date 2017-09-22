# ![logo](https://i.imgur.com/pI9L4Ly.png) Canary

Canary is a simple mail queuing and management

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
