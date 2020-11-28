<?php

declare(strict_types=1);

final class SamuelBeckett
{
    public const ESTRAGON = 'Estragon:';
    public const VLADIMIR = 'Vladimir:';
    public const POZZO = 'Pozzo:';
    public const BOY = 'Boy:';

    private $wikiQuotes;

    public function __construct(WikiQuotes $wikiQuotes)
    {
        $this->wikiQuotes = $wikiQuotes;
    }

    public function quote(): string
    {
        $wikiQuotes = $this->wikiQuotes->getQuotes();

        $cleanQuotes = $this->sanitizeHtmlQuotes($wikiQuotes);

        return $cleanQuotes[array_rand($cleanQuotes, 1)];
    }

    private function sanitizeHtmlQuotes(array $wikiQuotes): array
    {
        $names = [
            self::ESTRAGON,
            self::VLADIMIR,
            self::POZZO,
            self::BOY
        ];

        $sanitizedQuotes = [];
        foreach ($wikiQuotes as $quote) {
            foreach($names as $name) {
                if (strpos($quote->getQuote(), $name) !== false) {
                    $quote->quote = str_replace($name, '', $quote->quote);
                }
            }

            if ($quote->quote !== '') {
                $sanitizedQuotes[] = $quote->quote;
            }
        }

        return $sanitizedQuotes;
    }
}