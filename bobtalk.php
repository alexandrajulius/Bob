<?php

require 'vendor/autoload.php';

echo '
         /       
       [^_^]   
       /[_]\ 
        ] [   
' . PHP_EOL;
echo '[^_^]  Hello, I\'m Bob.' . PHP_EOL;

$bob = (new DIContainer())->getBob();

while (true) {
	$sentence = readline();
    echo '[^_^] '. $bob->reply($sentence) . PHP_EOL;
}
