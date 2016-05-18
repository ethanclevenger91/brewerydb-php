<?php

namespace BreweryDb;

use GuzzleHttp\Client;

class BreweryDb {
  private $client;
  private $baseUri = 'http://api.brewerydb.com/v2/';
  private $key;

  private $queryArgs;

  public function getQueryArgs() {
    return $this->queryArgs;
  }

  public function setQueryArgs($args) {
    $args['key'] = $this->key;
    $this->queryArgs = $args;
  }

  public function __construct($key) {
    $this->client = new Client([
      'baseUr' => $this->baseUri,
    ]);
    $this->key = $key;
  }

  public function brewery($args, $method = 'GET') {
    $this->updateArgs($args);
    return $this->client->request($method, 'brewery', [
      'query' => $this->queryArgs,
    ]);
  }
}
