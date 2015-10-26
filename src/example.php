<?php
  
require_once 'autoload.php';

$rotors = array(
  new \Enigma\Rotor('EKMFLGDQVZNTOWYHXUSPAIBRCJ', 10),
  new \Enigma\Rotor('AJDKSIRUXBLHWTMCQGZNPYFVOE'),
  new \Enigma\Rotor('BDFHJLCPRTXVZNYEIWGAKMUSQO')
);

$rotors[0]->initialize();

$reflector = new \Enigma\Reflector('EJMZALYXVBWFCRQUONTSPIKHGD ');


$machine = new \Enigma\Machine( $rotors, $reflector );

$result = $machine->parse('It works');

echo $result."\n";

echo "--------------------------\n";

$rotors = array(
  new \Enigma\Rotor('EKMFLGDQVZNTOWYHXUSPAIBRCJ', 10),
  new \Enigma\Rotor('AJDKSIRUXBLHWTMCQGZNPYFVOE'),
  new \Enigma\Rotor('BDFHJLCPRTXVZNYEIWGAKMUSQO')
);

$rotors[0]->initialize();

$decrypt = new \Enigma\Machine( $rotors, $reflector );
$decrypted = $decrypt->parse($result);

echo $decrypted."\n";