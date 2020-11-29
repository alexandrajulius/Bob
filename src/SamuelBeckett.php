<?php

declare(strict_types=1);

final class SamuelBeckett implements Author
{
    //if you had normalized data as quote.json you would not need a class for each other, and no cache
    //this is a scraper

    public const ESTRAGON = 'Estragon:';
    public const VLADIMIR = 'Vladimir:';
    public const POZZO = 'Pozzo:';
    public const BOY = 'Boy:';

    private $quoteProvider;

    public function __construct(QuoteProvider $quoteProvider)
    {
        $this->quoteProvider = $quoteProvider;
    }

    public function quote(): string
    {
        $wikiQuotes = $this->quoteProvider->getQuotes('Samuel Beckett');
        $cleanQuotes = $this->sanitizeHtmlQuotes($wikiQuotes);

        return $cleanQuotes[array_rand($cleanQuotes, 1)];
    }

    private function sanitizeHtmlQuotes(array $wikiQuotes): array
    {
        $actors = [
            self::ESTRAGON,
            self::VLADIMIR,
            self::POZZO,
            self::BOY
        ];

        $sanitizedQuotes = [];
        foreach ($wikiQuotes as $quote) {
            foreach($actors as $actor) {
                if (strpos($quote->getQuote(), $actor) !== false) {
                    $quote->quote = str_replace($actor, '', $quote->quote);
                }
            }

            if ($quote->quote !== '') {
                $sanitizedQuotes[] = $quote->quote;
            }
        }
        unset($sanitizedQuotes[0]);

        return $sanitizedQuotes;
    }
}