<?php
namespace Magenest\Injection\Model;
class Flame
{
    public $example_object;
    public function __construct(
        Spark $the_object
    )
    {
        $this->example_object = $the_object;
    }
}
