<?php

require 'src/Bob.php';
require 'src/WikiQuotes.php';
require 'src/SamuelBeckett.php';


echo '
         /       
       [^_^]   
       /[_]\ 
        ] [   
' . PHP_EOL;
echo '[^_^] Hello, I\'m Bob.' . PHP_EOL;

$bob = new Bob(new SamuelBeckett(new WikiQuotes()));

while (true) {
	$sentence = readline();
    echo '[^_^] '. $bob->reply($sentence) . PHP_EOL;
}
