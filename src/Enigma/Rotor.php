<?php
  
namespace Enigma;

/**
 * Rotor Circuit
 *
 * Responsible for subsituting the input (sequence) character with the appropriate subsitutes
 *
 * @author Benjamin J. Anderson <andeb2804@gmail.com>
 * @package Enigma
 * @since Oct 27th, 2015
 * @version v0.1.0
 */
class Rotor extends Circuit 
{

  /******************** PROPERTIES ********************/
  
  /** @var int $increment_notch Position in which to trip the next rotor rotation */
  private $increment_notch = 26;
  
  /** @var int $rotation Current rotor rotation count */
  private $rotation = 1;
  
	/******************** METHODS ********************/
	
	/******************** PRIVATE ********************/

  /**
   * Increments the rotation count.
   *
   * @since Oct 27th, 2015
   */
	private function incrementRotation()
	{
  	$this->rotation++;
	}
	/******************** PROTECTED ********************/
	
	/******************** PUBLIC ********************/
	
  /**
   * Shifts n elements in the sequence to the left
   *
   * @param int $n Number of elements to shift
   * @return bool If the sequence was shifted.
   * @since Oct 27th, 2015
   */
  public function shiftSequence( $n = 2 )
  {
    $shifted = $n > 1 ? true : false;
    if( $shifted )
    {
      $current_sequence = $this->getSequence();
      $sequence = array_splice($current_sequence, 0, $n - 1);
      $this->setSequence(array_merge($current_sequence, $sequence));
    }
    return $shifted;
  }
  
  /**
   * Rotates the rotor and shifts the sequence by 1 character
   *
   * @since Oct 27th, 2015
   */
  public function rotateAndShift()
  {
    $this->incrementRotation();
    $this->shiftSequence();
  }
  
  /**
   * Initializes the rotor
   *
   * @since Oct 27th, 2015
   */
  public function initialize()
  {
    $this->shiftSequence($this->getRingSetting());
  }
  
  /******************** GETTERS ********************/
  
  /**
   * Gets the increment notch property
   *
   * @return int The increment notch location.
   * @since Oct 27th, 2015
   */
  public function getIncrementNotch()
  {
    return $this->increment_notch;
  }
  
  /**
   * Gets the rotation property
   *
   * @return int The current rotor rotation
   * @since Oct 27th, 2015
   */
  public function getRotation()
  {
    return $this->rotation;
  }
  
  /******************** SETTERS ********************/
  
  /**
   * Sets the rotation count
   *
   * @since Oct 27th, 2015
   */
  public function setRotation( $n )
  {
    $this->rotation = $n;
  }
  
  /**
   * Sets the ring setting property
   *
   * @param int $ring_setting The new ring setting.
   * @since Oct 27th, 2015
   */
	public function setRingSetting( $ring_setting )
	{
    $this->ring_setting = $ring_setting;
	}
  
}