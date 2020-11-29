<?php

declare(strict_types=1);

final class Bob
{
    private $samuelBecket;

    public function __construct(SamuelBeckettScraper $samuelBeckett)
    {
        $this->samuelBecket = $samuelBeckett;
    }

    public function reply(string $phrase): string 
    {
        if (strpos($phrase, '?') !== false){
            return 'Sure.';
        }

        if (strpos($phrase, '!') !== false) {
            if ($this->numberOfCapitalLetters($phrase) > 3) {
                return 'Whoa, chill out!';
            }

            return $this->samuelBecket->quote();
        }

        if (empty($phrase) || ctype_space($phrase)){
            return 'Fine. Be that way!';
        }

        return $this->samuelBecket->quote();
    }

    private function numberOfCapitalLetters(string $string): int
    {
        return strlen(preg_replace('![^A-Z]+!', '', $string));
    }
}
