# brewerydb-php
A Laravel package for interfacing with the BreweryDB (http://brewerydb.com/) API. Uses `v2` of the API. Returns JSON.

## Installation

Require via Composer:

`composer require ethanclevenger91\brewerydb-php`

Publish the config:

`php artisan vendor:publish`

Add your API key in `.env`:

`BREWERYDB_API_KEY=yourkeyhere`

## Usage

```php
$breweryDb = App::make('brewerydb');
$result = $breweryDb->request('breweries', 'GET', [
  'order' => 'random',
  'randomCount' => 1
]);
```
