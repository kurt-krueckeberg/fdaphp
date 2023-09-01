<?php
declare(strict_types=1);
namespace OpenFda

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class OpenClient  {
   
  private Client $client;

  private $headers = array();

  private Config $c;

  public function __construct(string $config)
  {    
     $this->c = new Config($config_file); 

     $this->client = new Client($c->base_uri);
  }

  private function request(string $method, array $options = array()) : string
  {
     $options['headers'] = $this->headers;

     $response = $this->client->request($c->method, $c->endpoint, $options);

     return $response->getBody()->getContents();
  }

  final public function query(string | array $parm) : \stdClass
  {
     $contents = $this->request($this->method, $this->route, ['query' => $parm]); 

     $obj = json_decode($contents);

     return urldecode($obj->outputs[0]->output);
  }
}
