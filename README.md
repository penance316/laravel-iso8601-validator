Laravel ISO8601 Date Validator
============

Install
-------
```
composer require "penance316/laravel-iso8601-validator"
```

Add the required validator to boot method of `app/Providers/AppServiceProvider.php`
 
```
Validator::extend('iso_date', 'Penance316\Validators\IsoDateValidator@validateIsoDate');
```

Add the following lines to `resources/lang/en/validation.php` 

```
'iso_date' => 'The :attribute must be a valid ISO8601 string.',
```

#### Use like other validators

```
...
'reference'     => 'required|max:255',
'startDate'     => 'required|iso_date',
'email'         => 'required|email',
...
```

##### Only UTC

* Valid
    * `2012-04-23T18:25:43.511Z`
    * `2010-02-18T16:23.33+0600`
* No valid
    * `2012-04-23`
    * `2010-02-18T16:23.33`
```
'startDate'     => 'required|iso_date:utc',
```
