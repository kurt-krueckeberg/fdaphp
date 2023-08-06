<?php
declare(strict_types=1);
namespace OpenFda

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class Fda  {
   
  private Client $client;
  private Config $c;

  private $headers = array();
  private static $method = 'GET';

  public function __construct(Config $c)
   {    
      $this->client = new Client($c->base_uri());

      $this->c = $c; 

      $this->headers = $c->authorize();
   }

   // maybe not necessary since 
   private function request(string $method, array $options = array()) : string
   {
       $options['headers'] = $this->headers;
 
       $response = $this->client->request($c->method, $c->route(), $options);

       return $response->getBody()->getContents();
   }

   final public function request(Parms $parm) : \stdClass
   {
       $query = array();

       if ($parm->search !== '') 
               $query['search'] = $parm->search;

       if ($parm->count !== '') 
               $query['count'] = $parm->count;
       
       $query['limit'] = $parms->limit;

       $query['skip'] = $parms->skip;

       $contents = $this->request(self::$method, $this->route, ['query' => $query]]);

       $obj = json_decode($contents);

       return urldecode($obj->outputs[0]->output);
   }

   // todo: incoroporate the other ways of passing a query string to the Client
   final public function query(string $query_string) : \stdClass
   {
       $contents = $this->request(self::$method, $this->route, ['query' => $query_string]); 

       $obj = json_decode($contents);

       return urldecode($obj->outputs[0]->output);
   }
   

}
