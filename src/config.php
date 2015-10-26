<?php

/*
           ABCDEFGHIJKLMNOPQRSTUVWXYZ
  Rotor 1: EKMFLGDQVZNTOWYHXUSPAIBRCJ
           
           ABCDEFGHIJKLMNOPQRSTUVWXYZ
  Rotor 2: AJDKSIRUXBLHWTMCQGZNPYFVOE
  
           ABCDEFGHIJKLMNOPQRSTUVWXYZ
  Rotor 3: BDFHJLCPRTXVZNYEIWGAKMUSQO
  
  plugboard: ABCDEFGHIJKLMNOPQRSTUVWXYZ
  reflector: EJMZALYXVBWFCRQUONTSPIKHGD
  
  A
  ----
  
  A - E
  E - S
  S - G
  
  ref: G - Y
  
  Y - O
  O - Y
  Y - O
  
  ----
  
  O - Y
  Y - O
  O - Y
  
  ref: Y - G
  
  G - S
  S - E
  E - A
  
*/

/**
 * @const BASE_PATH The root path of the Enigma Application.
 */ 
define( 'BASE_PATH', dirname(__FILE__) );