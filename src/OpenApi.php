<?php
declare(strict_types=1);
namespace OpenFda

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/*
Go with one class and no base, with GuzzleHttp/Client as a property
*/

class OpenApi extends RestApi {
   
   private string $route;

   private static $method = 'GET';

  /*
   * ConfigFile has base_uri, endpoint, and API key that goes in header.
   */ 
  public function __construct(ConfigFile $c)
   {      
      parent::__construct($c->headers(), $c->endpoint()); 

      $this->route = $c->route();
   }

   /*
    * External code must build the array of openFDA API parameters.
    * He must know what he wants to do (and even which params are optional).
    */
   final public function query(array $parms) : \stdClass
   {
       $contents = $this->request(self::$method, $this->route, ['query' => $parms]); 

       $obj = json_decode($contents);

       return urldecode($obj->outputs[0]->output);
   }
}
