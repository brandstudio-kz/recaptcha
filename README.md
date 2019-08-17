# Brandstudio/Recaptcha
Simple [Laravel](https://laravel.com/docs/5.8) package for working with [Google reCAPTCHA v3](https://developers.google.com/recaptcha/docs/v3)


## Getting Started

### Installation

#### 1) Run command
```
composer require brandstudio/recaptcha
```
Or add "brandstudio/recaptcha": "^1.0@dev" to your composer.json

#### 2) Publish the config file (optional)
```
php artisan vendor publish --provider="BrandStudio/Recaptcha/RecaptchaServiceProvider" --tag=config
```

## Configuration
brandstudio/recaptcha.php file
```
    /**
     * Enable/Disable reCAPTCHA
     */
    'enabled'        => env('BS_RECAPTCHA_ENABLED', true),

    /**
     * Middleware alias
     */
    'middleware_name'   => 'recaptcha',

    /**
     * Frontend integration
     */
    'url'               => 'https://www.google.com/recaptcha/api.js?render=',

    /**
     * Your sitekey
     */
    'public_key'        => env('BS_RECAPTCHA_PUBLIC', ''),

    /**
     * Response verification
     */
    'verification_url'  => 'https://www.google.com/recaptcha/api/siteverify',

    /**
     * Your secret key
     */
    'private_key'       => env('BS_RECAPTCHA_PRIVATE', ''),

```
## Usage
#### In your .blade file
```
@include('brandstudio::recaptcha.scripts')
/// Or
@include('brandstudio::recaptcha.scripts', ['recaptcha_action' => 'your-action-name'])
```
#### In controller
```
public function __construct()
{
    ...
    $this->middleware('middleware_name');
    ...
}
```
Or
```
public function __construct()
{
    ...
    $this->middleware(config('backpack.recaptcha.middleware_name'));
    ...
}
```

#### In routes
```
Route::method('/url', 'Controller@function')->middleware('middleware_name');
```
Or
```
Route::middleware([..., 'recaptcha'])->group(function() {
    ...
    Route::method('/url', 'Controller@function');
    ...
);
```
