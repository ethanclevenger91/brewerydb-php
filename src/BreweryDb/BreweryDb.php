<?php

namespace Ethanclevenger91\BreweryDb;

class BreweryDb {
  private $client;
  private $version = 'v2';
  private $key;

  private $queryArgs;

  public function getQueryArgs() {
    return array_merge(['key' => $this->key], $this->queryArgs);
  }

  public function setQueryArgs($args) {
    $this->queryArgs = $args;
  }

  public function __construct(Client $client) {
    $client->version = config('brewerydb.api_version');
    $this->client = $client;
    $this->key = config('brewerydb.api_key');
  }

  public function request($endpoint, $method = 'GET', $args = null) {
    if($args) {
      $this->updateArgs($args);
    }
    return $this->client->request($method, $endpoint, [
      'query' => $this->getQueryArgs()
    ]);
  }
}
