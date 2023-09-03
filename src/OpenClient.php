<?php
declare(strict_types=1);
namespace OpenFda;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class OpenClient  {
   
  private Client $client;

  private $headers = array();

  private Config $c;

  array $options = array();

  public function __construct(string $fname)
  {    
     $this->c = new Config($fname); 


     //  Q: Cn I pass some default options on the ctor--does it
     // help in any way?
     $this->client = new Client(
             ['base_uri' => $this->c->base_url]
             );

     
     $this->options['headers'] = $this->headers;
  }

  /*
  private function request(string $method, array $options = array()) : string
   */

  private function request(string $query, array $options = array()) : string
  { 
     $this->options['query'] = $query; // todo: Make sure that GuzzleHttp\Client accepts
     // a string a value for 'query' key.

     $response = $this->client->request($c->method, $c->endpoint, $this->options);

     return $response->getBody()->getContents();
  }

  final public function query(string | array $parm) : \stdClass
  {
     $contents = $this->request($this->method, $this->route, ['query' => $parm]); 

     $obj = json_decode($contents);

     return urldecode($obj->outputs[0]->output);
  }
}
