<?php

declare(strict_types=1);


final class TypeFitQuotesProvider implements QuoteProvider
{
    /**
     * @return Quote[]
     */
    public function getQuotes(string $author): array
    {
        return [new Quote('Samuel Beckett', 'Waiting for Godot')];
    }
}