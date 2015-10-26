<?php

use \Enigma\Rotor as Rotor;

class RotorTest extends \PHPUnit_Framework_TestCase
{
  
  private $rotor = null;
  private $sub_text = 'EKMFLGDQVZNTOWYHXUSPAIBRCJ';
  protected function setUp()
  {
    $this->rotor = new Rotor($this->sub_text);
  }
  
  public function testShiftSequenceIfValidNumber()
  {
    $mock = $this->getMockBuilder('\Enigma\Rotor')
                 ->setConstructorArgs(array($this->sub_text, 10))
                 ->setMethods(array('__construct','setSequence'))
                 ->getMock();

    $mock->expects($this->once())
         ->method('setSequence')
         ->with($this->isType('array'));
         
    $mock->expects($this->any())
         ->method('getSequence')
         ->with($this->isType('array'));
    
    $this->assertTrue($mock->shiftSequence(4));
     
  }
  
  public function testShiftSequenceFailsIfNotValidNumber()
  {
    $this->assertFalse($this->rotor->shiftSequence(1));
  }
  
  public function testsubsituteCharacter()
  {
    $this->assertSame($this->rotor->subsituteCharacter('A'), 'E');
  }
  
  public function testreflectCharacter()
  {
    $this->assertSame($this->rotor->reflectCharacter('E'), 'A');
  }
  
  public function testGetIncrementNotch()
  {
    $this->assertEquals($this->rotor->getIncrementNotch(), 26);
  }
  
  public function testGetRotation()
  {
    $this->assertEquals($this->rotor->getRotation(), 1);
  }
  
  public function testRotateAndShiftIteratesRotation()
  {
    $this->rotor->rotateAndShift();
    $this->assertEquals($this->rotor->getRotation(), 2);
  }
  
  public function testRotateAndShiftShiftsSequence()
  {
    $this->rotor->rotateAndShift();
    $this->assertEquals($this->rotor->getSequence(), array(
		  'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'A'
    ));
  }
  
}