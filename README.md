# NCU portal login

NCUPortal is a library providing an easier and expressive way to use -[NCU Prtal](https://portal.ncu.edu.tw) to let users login to your application.

## Requirements

- PHP >=5.4

## Installation
Add this to your composer.json, require and *repositories*

```json
"require": {
  "weigreen/ncuportal": "dev-master"
},
"repositories": [
	{
		"type": "vcs",
		"url": "https://github.com/andy199310/NCUPortal.git"
	}
	]
```

## Examples

First phase (create url to redirect user to ncu portal)
```php
// Set up NCUPortal with your application's domain
$ncuPortal = new NCUPortal('your-application-domain');

// Get Auth URL with call back url
$ncuPortal->getAuthUrl('call-back-url');

```
PS: callback url is used when user login on [NCU Prtal](https://portal.ncu.edu.tw) and will redirect to callback url

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

## License

NCUPortal is licensed under the [MIT License](http://opensource.org/licenses/MIT).
