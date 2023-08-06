<?php
declare(strict_types=1);
namespace OpenFda

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class Parms {

   public readonly string $search;
   public readonly string $count;
   public readonly int $limit;
   public readonly int $offset;

   public function __construct(public readonly string $search = '',
   {                           public readonly string $count = '',
                               public readonly    int $limit = 10,
                               public readonly    int $offset = 0)

   }
}
