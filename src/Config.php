<?php
declare(strict_types=1);
namespace OpenFda

class Config {

   private \SimpleXMLElement $xml;

   private array $headers = array();

   public function __construct(string $xml_name)
   {   
      $this->xml = simplexml_load_file($xml_name);

      $this->headers_();
   }

   public function endpoint() : string
   {
      return (string) $this->xml->endpoint;
   }
 
   public function route() : string
   {
      return (string) $this->xml->route;
   }

   private function headers_() : null
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
