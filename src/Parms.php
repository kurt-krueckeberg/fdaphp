<?php
declare(strict_types=1);
namespace OpenFda;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class Parms {

   public readonly string $search;
   public readonly string $count;
   public readonly int $limit;
   public readonly int $offset;

   public function __construct(string $search = '',
              string $count = '',
              int $limit = 10,
              int $offset = 0)
   {

   }

   static public function fromString(string $str, string $delim)
   {
      $a = explode($str, $delim);

   }
}
