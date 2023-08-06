<?php
declare(strict_types=1);
namespace OpenFda

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class Fda  {
   
  private Client $client;
  private Config $config;

  private static $method = 'GET';

  public function __construct(ConfigFile $c)
   {    
      // $c->headers(), $c->endpoint());   

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
   final public function query(string $query_string) : \stdClass
   {
       $contents = $this->request(self::$method, $this->route, ['query' => $query_string]); 

       $obj = json_decode($contents);

       return urldecode($obj->outputs[0]->output);
   }
   
   final public function request(Parms $parm) : \stdClass
   {
       $query = array();

       if ( 
       $contents = $this->request(self::$method, $this->route, ['query' => [ 'search' => $search, ]]);
                                                              ]); 

       $obj = json_decode($contents);

       return urldecode($obj->outputs[0]->output);
   }

}
