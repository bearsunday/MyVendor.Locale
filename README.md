# MyVendor.Locale

A minimam content negotiation example application.

## Installation

    composer install

## locale setting

```php
<?php

require dirname(__DIR__) . '/vendor/autoload.php';

$available = [
    'Accept' => [
        'text/hal+json' => 'hal-app',
        'application/json' => 'app',
        'cli' => 'cli-hal-app'
    ],
    'Accept-Language' => [
        'ja-JP' => 'ja',
        'ja' => 'ja',
        'en-US' => 'en',
        'en' => 'en'
    ]
];
$accept = new \BEAR\Accept\Accept($available);
list($context, $vary) = $accept($_SERVER);

require dirname(__DIR__) . '/bootstrap/bootstrap.php';

```
## Usage

```
composer serve
curl -i http://127.0.0.1:8080/
```


```
HTTP/1.1 200 OK
Host: 127.0.0.1:8080
Date: Fri, 11 Aug 2017 05:36:46 +0200
Connection: close
X-Powered-By: PHP/7.1.4
Vary: Accept, Accept-Language
content-type: application/hal+json

{
    "greeting": "\u3053\u3093\u306b\u3061\u306f BEAR.Sunday",
    "_links": {
        "self": {
            "href": "/index"
        }
    }
}
```

## Accept-Language header

with `Accept-Language` header

```
// prefer English
curl -H 'Accept-Language: en' http://127.0.0.1:8080/
```

```
{
    "greeting": "Hello BEAR.Sunday",
    "_links": {
        "self": {
            "href": "/index"
        }
    }
}
```

## Accept header

with `Accept` header

```
curl -i -H 'Accept: application/json' http://127.0.0.1:8080/
```

```
HTTP/1.1 200 OK
Host: 127.0.0.1:8080
Date: Fri, 11 Aug 2017 05:51:27 +0200
Connection: close
X-Powered-By: PHP/7.1.4
Vary: Accept, Accept-Language
content-type: application/json

{"greeting":"Hello BEAR.Sunday"}

```
