<?php
  
namespace Enigma;

trait CipherTrait
{

  /**
   * Encrypts a character
   *
   * @param char $character The character to encrypt
   * @return char The encrypted character
   * @since Oct 27th, 2015
   */
  public function subsituteCharacter( $character )
  {
    $index = array_search(strtoupper($character), $this->sequence);
    return $this->subsitutes[$index];
  }
  
  /**
   * Decrypts a character
   *
   * @param char $character The character to decrypt
   * @return char The decrypted character
   * @since Oct 27th, 2015
   */
  public function reflectCharacter( $character )
  {
    $index = array_search(strtoupper($character), $this->subsitutes);
    return $this->sequence[$index];
  }
  
}