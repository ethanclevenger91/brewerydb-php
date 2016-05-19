<?php

namespace Ethanclevenger91\BreweryDb;

use GuzzleHttp\Client;

class BreweryDb {
  private $client;
  private $key;

  private $queryArgs;

  public function setKey($key) {
    $this->key = $key;
  }

  public function getQueryArgs() {
    return array_merge(['key' => $this->key], $this->queryArgs);
  }

  public function setQueryArgs($args) {
    $this->queryArgs = $args;
  }

  public function __construct(Client $client) {
    $this->client = $client;
  }

  public function request($endpoint, $method = 'GET', $args = null) {
    if($args) {
      $this->setQueryArgs($args);
    }
    return $this->client->request($method, $endpoint, [
      'query' => $this->getQueryArgs(),
      'debug' => true
    ]);
  }
}
