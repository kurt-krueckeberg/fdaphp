<?php
declare(strict_types=1);
namespace OpenFda

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class OpenApi extends RestApi {
   
   private string $route;

   private static $method = 'GET';

   /*
     ConfigFile has base_uri, endpoint, and API key that goes in header.
    */ 
   public function __construct(ConfigFile $c)
   {      
      parent::__construct($c->headers(), $c->endpoint()); 

      $this->route = $c->route();
   }

   /*
    * External code must build array of $parameters. 
    * The client must know that skip and offset are optional
    */
   final public function query(array $parms) : \stdClass
   {
       $contents = $this->request(self::$method, $this->route, ['query' => $parms]); 

       $obj = json_decode($contents);

       return urldecode($obj->outputs[0]->output);
   }
}
