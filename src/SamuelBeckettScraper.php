<?php

declare(strict_types=1);

final class SamuelBeckettScraper
{
    private const AUTHOR = 'Samuel Beckett';
    private const ESTRAGON = 'Estragon:';
    private const VLADIMIR = 'Vladimir:';
    private const POZZO = 'Pozzo:';
    private const BOY = 'Boy:';

    private $quoteProvider;

    public function __construct(QuoteProvider $quoteProvider)
    {
        $this->quoteProvider = $quoteProvider;
    }

    public function quote(): string
    {
        $wikiQuotes = $this->quoteProvider->getQuotes(self::AUTHOR);
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