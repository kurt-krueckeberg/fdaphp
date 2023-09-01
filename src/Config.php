<?php
declare(strict_types=1);
namespace OpenFda;

class Config {

   private \SimpleXMLElement $xml;

   public readonly array $headers;
   public readonly string $method;
   public readonly string $endpoint;
   public readonly string $base_url;

   public function __construct(string $fname)
   {   
      $this->xml = simplexml_load_file($fname);

      $this->base_url = (string) $this->xml->base_url;
      $this->endpoint = (string) $this->xml->endpoint;
      $this->method = (string) $this->xml->method;

      $this->headers = $this->get_headers(); 
   }

   private function get_headers() : array
   {
      $auth = array();
        
      $auth[(string) $this->xml->header->authorization['key']] = (string) $this->xml->header->authorization;
 
      return $auth;
   }
  
   public function headers() : array
   {
      return $this->authorize;
   }
}
