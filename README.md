# MyVendor.Locale

A minimam content negotiation example application.

## Run

```
git clone https://github.com/bearsunday/MyVendor.Locale.git
composer install
composer serve
```

Requeset without `Accept*` header

```
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

Requeset with `Accept-Language` header

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

Requeset with `Accept` header

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

See local setting at [public/index.php](https://github.com/bearsunday/MyVendor.Locale/blob/master/public/index.php)
