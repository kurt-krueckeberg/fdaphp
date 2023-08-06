<?php
declare(strict_types=1);
namespace OpenFda

class Config {

   private \SimpleXMLElement $xml;

   public function __construct(string $xml_fname)
   {   
      $this->xml = simplexml_load_file($xml_fname);
   }

   public function endpoint() : string
   {
      return (string) $this->xml->endpoint;
   }

   public function headers() : array
   {
      return $this->simplexml->headers;
   }
}
