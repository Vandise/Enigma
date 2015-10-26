<?php

class Circuit extends \PHPUnit_Framework_TestCase
{
  
  private $class_name = null;
  private $sub_text = 'EKMFLGDQVZNTOWYHXUSPAIBRCJ';
  
  protected function setUp()
  {
    $this->class_name = '\Enigma\Circuit';
  }
  
  public function testConstructParsesSubsituteTextToArray()
  {
    $mock = $this->getMockBuilder($this->class_name)
                 ->disableOriginalConstructor()
                 ->setMethods(array('setSubsitutes'))
                 ->getMockForAbstractClass();

    $mock->expects($this->once())
         ->method('setSubsitutes')
         ->with($this->isType('array'));      
      
    $constructor = (new \ReflectionClass($this->class_name))->getConstructor();
    $constructor->invoke($mock, $this->sub_text);
    
  }
  
  public function testConstructAssignsRingSetting()
  {
    $mock = $this->getMockBuilder($this->class_name)
                 ->disableOriginalConstructor()
                 ->setMethods(array('setRingSetting'))
                 ->getMockForAbstractClass();

    $mock->expects($this->once())
         ->method('setRingSetting')
         ->with($this->equalTo(1));      
      
    $constructor = (new \ReflectionClass($this->class_name))->getConstructor();
    $constructor->invoke($mock, $this->sub_text, 1);
    
  }
  
  public function testGetSubsitutesReturnsSubsitutiesProperty()
  {
    $mock = $this->getMockBuilder($this->class_name)
                 ->setMethods(array('__construct'))
                 ->setConstructorArgs(array($this->sub_text, 10))
                 ->getMock();

    $this->assertEquals(count($mock->getSubsitutes()), 26);
  }
  
  public function testGetRingSetting()
  {
    $mock = $this->getMockBuilder($this->class_name)
                 ->setMethods(array('__construct'))
                 ->setConstructorArgs(array($this->sub_text, 10))
                 ->getMock();

    $this->assertEquals($mock->getRingSetting(), 10);
  }
  
  public function testSetRingSetting()
  {
    $mock = $this->getMockBuilder($this->class_name)
                 ->setMethods(array('__construct'))
                 ->setConstructorArgs(array($this->sub_text, 2))
                 ->getMock();
    
    $this->assertEquals($mock->getRingSetting(), 2);
    $mock->setRingSetting(10);
    $this->assertEquals($mock->getRingSetting(), 10);
  }
  
  public function testSetSubsitutes()
  {
    $mock = $this->getMockBuilder($this->class_name)
                 ->setMethods(array('__construct'))
                 ->setConstructorArgs(array($this->sub_text))
                 ->getMock();
    
    $mock->setSubsitutes(array('a','s','d'));
    $this->assertSame($mock->getSubsitutes(), array('a','s','d'));
  }
  
}