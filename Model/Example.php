<?php
namespace Magenest\Injection\Model;
class Example
{
    public $property_of_example_object;
    public function __construct(
        Argument1 $the_object
    )
    {
        $this->property_of_example_object = $the_object;
    }
}
