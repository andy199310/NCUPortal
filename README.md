# NCU portal login

NCUPortal is a library providing an easier and expressive way to use [NCU Portal](https://portal.ncu.edu.tw) to let users login to your application.

## Requirements

- PHP >=5.4

## Installation
Add this to your composer.json.

```json
"require": {
  "weigreen/ncuportal": "v1.0.0"
}
```

## Examples

First phase (create url to redirect user to ncu portal)
```php
// Set up NCUPortal with your application's domain
$ncuPortal = new NCUPortal('your-application-domain');

// Get Auth URL with call back url
$ncuPortal->getAuthUrl('call-back-url');

```
PS: callback url is used when user login on [NCU Portal](https://portal.ncu.edu.tw) and will redirect to callback url

Second phase (callback)
```php
// Set up NCUPortal with your application's domain
$ncuPortal = new NCUPortal('your-application-domain');

// Check if callback is validate or not
// One time used. Second call will be false
if($ncuPortal->checkLoginValidate()){
  echo "Login Real";
  // get login account
  echo $ncuPortal->getLoginAccount();
}else{
  echo "Login is not real >_<";
}

```

## Bug

If you found bugs, please contact me at issue. thanks :)

## Links

* [iignatov/LightOpenID](https://github.com/iignatov/LightOpenID) -
  Library used for openid.
* [OpenID Dev Specifications](http://openid.net/developers/specs/) -
  documentation for the OpenID extensions and related topics.

## License

NCUPortal is licensed under the [MIT License](http://opensource.org/licenses/MIT).
