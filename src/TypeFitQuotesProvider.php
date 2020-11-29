<?php

declare(strict_types=1);


final class TypeFitQuotesProvider implements QuoteProvider
{
    public function getQuotes(string $author): array
    {
        return [new Quote('Samuel Beckett', '')];
    }
}