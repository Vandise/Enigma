<?php
  
namespace Enigma;

/**
 * The Enigma Machine
 *
 * Encrypts and Decodes Messages
 *
 * @author Benjamin J. Anderson <andeb2804@gmail.com>
 * @package Enigma
 * @since Oct 27th, 2015
 * @version v0.1.0
 */
class Machine
{
  
  /******************** PROPERTIES ********************/
  
  /** @var array $rotors The Rotors to Execute the Cipher */
  private $rotors = array();
  
  /** @var \Enigma\Reflector $reflector The 'Static' rotor */
  private $reflector;
  
  
	/******************** METHODS ********************/
	
	/******************** PRIVATE ********************/
	
  /**
   * Checks to see if the next rotor needs to be iterated
   * This checks the state of the previous rotor to see if it has
   * iterated past the notch.
   *  - If the rotation has passed the increment notch
   *  - Always true if the first rotor (rotates every "keypress")
   *  - Always false if the last rotor (no rotor to rotate after it)
   *
   * @param char $rotor_num The current rotor.
   * @return bool Whether to rotate the current rotor
   */
	private function rotateNextRotor( $rotor_num )
	{
    if( $rotor_num == 0 ){ return false; }
    $rotor_num--;
    $rotor = $this->rotors[ $rotor_num ];
    if( $rotor_num == (count($this->rotors) - 1) ){ return false; }
    if( $this->trippedNotch($rotor_num) ){ return true; }
    return false;
	}
	
  /**
   * Checks to see if the rotor tripped the notch
   *
   * @param int $rotor_num The previous rotor
   * @return bool If the notch was surpassed
   */
	private function trippedNotch( $rotor_num )
	{
  	$next = $rotor_num + 1;
    $rotor = $this->rotors[$rotor_num];
    if( $rotor->getRotation() > $rotor->getIncrementNotch() ){
      $this->rotors[$rotor_num]->setRotation(1);
      $this->rotors[$next]->rotateAndShift();
      return true; 
    }
    return false;
	}
	
  /**
   * Runs a character through the rotors
   *
   * @param char $character The character to run through the rotors.
   */
	private function iterateRotors( $character )
	{
    $rotor_count = count($this->rotors);
    for( $i = 0; $i < $rotor_count; $i++ )
    {
      $rotate = ( $this->rotateNextRotor($i) || ($i == 0) );
      if( $rotate ) 
      {
        $this->rotors[$i]->rotateAndShift();
      }
      $character = $this->rotors[$i]->subsituteCharacter( $character );
    }
    return $this->reflectRotors( $character );
	}
	
  /**
   * Reflects a character through the rotors
   *
   * @param char $character The character to run through the rotors.
   */
	private function reflectRotors( $character )
	{
  	$character = $this->reflect( $character );
    $rotor_count = count($this->rotors) - 1;
    for( $i = $rotor_count ; $i >= 0; $i-- )
    {
      $character = $this->rotors[$i]->reflectCharacter( $character );
    }
    return $character;
	}
	
  /**
   * Runs the character through the reflector
   *
   * @param char $character The character to run through the rotors.
   */
	private function reflect( $character )
	{
    return $this->reflector->subsituteCharacter( $character );
	}
	
	/******************** PROTECTED ********************/
	
	/******************** PUBLIC ********************/
	
  /**
   * Enigma Machine Constructor
   *
   * @param array $rotors The machine rotors.
   * @param \Enigma\Reflector $reflector The machine static rotor.
   */
  public function __construct( array $rotors, $reflector )
  {
    $this->rotors = $rotors;
    $this->reflector = $reflector;
  }
  
  /**
   * Runs a string through the cipher
   *
   * @param string $string The string to iterate through.
   */
  public function parse( $string )
  {
    $output = '';
    $string = str_replace(' ', '', $string);
    $len = strlen($string);
    for( $i = 0; $i < $len; $i++ )
    {
      $output .= $this->iterateRotors( $string[$i] );
    }
    return chunk_split($output,5,' ');
  }

}