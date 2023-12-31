<?php
declare(strict_types=1);
namespace OpenFda;

class ResultsIterator extends \ArrayIterator { // implements IteratorAggregate?
    
    private $func;
   
    public function __construct(array $results, callable $func)
    {
       parent::__construct($results);
       $this->func = $func;
    }
    
   public function current() : mixed
   {
       return ($this->func)(parent::current());
   }
}
