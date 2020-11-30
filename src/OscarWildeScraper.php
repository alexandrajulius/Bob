<?php

declare(strict_types=1);

final class OscarWildeScraper
{
    private $quoteProvider;

    public function __construct(QuoteProvider $quoteProvider)
    {
        $this->quoteProvider = $quoteProvider;
    }

    public function quote(): string
    {
        $wikiQuotes = $this->quoteProvider->getQuotes('Oskar Wilde');
        $cleanQuotes = $this->sanitizeHtmlQuotes($wikiQuotes);

        return $cleanQuotes[array_rand($cleanQuotes, 1)];
    }

    private function sanitizeHtmlQuotes(array $wikiQuotes): array
    {
        $sanitizedQuotes = [];
        foreach ($wikiQuotes as $quote) {
            if ($quote->quote !== '') {
                $sanitizedQuotes[] = $quote->quote;
            }
        }
        unset($sanitizedQuotes[0]);

        return $sanitizedQuotes;
    }
}