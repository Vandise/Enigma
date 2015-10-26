<?php

namespace Enigma;

/**
 * Circuit Base
 *
 * This is the base object for all Circuits in the enigma
 *
 * @author Benjamin J. Anderson <andeb2804@gmail.com>
 * @package Enigma
 * @since Oct 27th, 2015
 * @version v0.1.0
 */
abstract class Circuit
{
  
  use \Enigma\CipherTrait;
  
  /******************** PROPERTIES ********************/
  
  /** @var array $subsitutes Contains the value to be subsituted in the sequence */
  protected $subsitutes = array();
  
  /** @var int $ring_setting The inital ring setting for the sequence */
  protected $ring_setting;
  
  /** @var array $sequence All valid characters, shifts on the turning of a rotor or ring setting */
  protected $sequence = array(
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
	);
	
	/******************** METHODS ********************/
	
	/******************** PRIVATE ********************/
	
	/******************** PROTECTED ********************/
	
	/******************** PUBLIC ********************/
	
  /**
   * Base Circuit Constructor - Constructs a circuit
   *
   * @param string $subsitute_string The string in which the sequence will be subsituted for.
   */
	public function __construct( $subsitute_string, $ring_setting = 1 )
	{
  	$subs = array();
  	$len = strlen($subsitute_string);
    for($i=0; $i<$len; $i++){ $subs[] = $subsitute_string[$i]; }
    $this->setSubsitutes( $subs );
    $this->setRingSetting( $ring_setting );
	}
	
	/******************** GETTERS ********************/
	

  /**
   * Returns the subsitutes array
   *
   * @return Array Subsitutes in the subsitutes array.
   * @since Oct 27th, 2015
   */
	public function getSubsitutes()
	{
  	return $this->subsitutes;
	}
	
  /**
   * Returns the current ring setting
   *
   * @return int The current ring setting
   * @since Oct 27th, 2015
   */
	public function getRingSetting()
	{
    return $this->ring_setting;
	}
	
  /**
   * Returns the current sequence array
   *
   * @return Array Seqences in the seqence array.
   * @since Oct 27th, 2015
   */
	public function getSequence()
	{
    return $this->sequence;
	}
	
	/******************** SETTERS ********************/
	
  /**
   * Sets the subsitutes property
   *
   * @param array $subsitutes The new subsitutes array.
   * @since Oct 27th, 2015
   */
	public function setSubsitutes( array $subsitutes )
	{
  	$this->subsitutes = $subsitutes;
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
	
  /**
   * Sets the sequence property
   *
   * @param array $sequence The new sequence.
   * @since Oct 27th, 2015
   */
	public function setSequence( array $sequence )
	{
    $this->sequence = $sequence;
	}
  
}