<?php

declare(strict_types=1);

final class CachedQuoteProvider implements QuoteProvider
{
    private $quoteProvider;

    public function __construct(QuoteProvider $quoteProvider)
    {
        $this->quoteProvider = $quoteProvider;
    }

    public function getQuotes(string $author, string $book): array
    {
        $author = str_replace(' ', '', $author);
        $book = str_replace(' ', '', $book);
        $cacheFile = './data/' . $author . $book . 'Cache.txt';

        if (file_exists($cacheFile)) {
            return unserialize(file_get_contents($cacheFile));
        }

        $quotes = $this->quoteProvider->getQuotes($author, $book);

        file_put_contents($cacheFile, serialize($quotes));

        return $quotes;
    }
}