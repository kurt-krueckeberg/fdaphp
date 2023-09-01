<?php
declare(strict_types=1);
namespace OpenFda

class Config {

   private \SimpleXMLElement $xml;

   publid readonly array $headers = array();
   public readonly $method;
   public readonly $endpoint;
   public readonly $baseurl;

   public function __construct(string $xml_name)
   {   
      $this->xml = simplexml_load_file($xml_name);

      $this->base_url = (string) $this->xml->base_rule;
      $this->endpoint = (string) $this->xml->endpoint;
      $this->method = (string) $this->xml->method;
      $this->set_headers();
   }

/*
   public function endpoint() : string
   {
      return (string) $this->xml->endpoint;
   }
 
   public function route() : string
   {
      return (string) $this->xml->route;
   }
*/
   private function set_headers() : null
   {
       foreach($simplexml->headers->header as $header) {

          $key = (string) $header['key'];

          $this->headers[$key] = (string) $header;              
       }
   }

   public function headers() : array
   {
      return $this->authorize;
   }
}
