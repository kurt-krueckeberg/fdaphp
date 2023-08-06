<?php
declare(strict_types=1);
namespace OpenFda

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/*
Go with one class and no base, with GuzzleHttp/Client as a property
*/

class Fda  {
   
   private Client $client;
   private Config $config;

   private static $method = 'GET';

  /*
   * ConfigFile has base_uri, endpoint, and API key that goes in header.
   */ 
  public function __construct(ConfigFile $c)
   {    
      $c->headers(), $c->endpoint());   

      $this->client = new Client($c->base_uri());

      $this->route = $c->route();
   }

   // maybe not necessary since 
   private function request(string $method, string $route, array $options = array()) : string
   {
       $options['headers'] = $this->header_options();
 
       $response = $this->client->request($method, $route, $options);

       return $response->getBody()->getContents();
   }

   // todo: incoroporate the other ways of passing a query string to the Client
   final public function query(array $parms) : \stdClass
   {
       $contents = $this->request(self::$method, $this->route, ['query' => $parms]); 

       $obj = json_decode($contents);

       return urldecode($obj->outputs[0]->output);
   }
}
