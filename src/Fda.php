<?php
declare(strict_types=1);
namespace OpenFda

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class Fda  {
   
  private Client $client;

  private string $route;
  private string $method;
  private $headers = array();

  private Config $c;

  public function __construct(Config $c)
  {    
      $this->client = new Client($c->base_uri());

      $this->c = $c; 

      $this->route = $c->route();

      $this->method = $c->method();

      $this->headers = $c->headers();
   }

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

   final public function query(string $query_string) : \stdClass
   {
       $contents = $this->request($this->method, $this->route, ['query' => $query_string]); 

       $obj = json_decode($contents);

       return urldecode($obj->outputs[0]->output);
   }
}
