<?php
namespace Magenest\Injection\Model;
class Spark
{
    public $argument_object;
    public $target;
    public function __construct(
        Tinder1 $the_argument,
        $target = "default"
    )
    {
        $this->argument_object = $the_argument;
        $this->target = $target;
    }
}
