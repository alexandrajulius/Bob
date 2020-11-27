<?php

require 'src/Bob.php';
require 'src/WikiQuotes.php';
require 'src/SamuelBeckett.php';

echo 'Hello, I\'m Bob.' . PHP_EOL;

$bob = new Bob(new SamuelBeckett(new WikiQuotes()));

while (true) {
	$sentence = readline();
    echo $bob->reply($sentence) . PHP_EOL;
}
