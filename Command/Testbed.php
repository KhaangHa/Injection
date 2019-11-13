<?php
namespace Magenest\Injection\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\ObjectManagerInterface;
use Magenest\Injection\Traits\ObjectReport;

class Testbed extends Command
{
    use ObjectReport;
    
    protected $om;
    public function __construct(ObjectManagerInterface $om)
    {
        $this->om = $om;
        return parent::__construct();
    }
    
    protected function configure()
    {
        $this->setName("magenest:virtual-type");
        $this->setDescription("A command the programmer was too lazy to enter a description for.");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $output;
//        $output->writeln("Installed Pulsestorm_TutorialVirtualType!");
        $this->showNestedPropertiesForObject();
    }

    protected function getObjectManager()
    {
        return $this->om;
    }
    protected function showNestedPropertiesForObject()
    {
        $object_manager = $this->getObjectManager();        
        $example         = $object_manager->create('Magenest\Injection\Model\Flame');
        $this->output(" SPARK ARGUMENTS CONSTRUCTED IN FLAME:");
        $properties     = get_object_vars($example->example_object);
        foreach($properties as $name=>$property)
        {
            $this->reportOnVariable($name, $property);       
        }  
        
        $this->output(" SPARK ARGUMENTS SELF CONSTRUCTED");
        $argument1  = $object_manager->create('Magenest\Injection\Model\Spark');
        $properties = get_object_vars($argument1);        
        foreach($properties as $name=>$property)
        {
            $this->reportOnVariable($name, $property);       
        }          
    }                     
} 