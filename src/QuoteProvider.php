<?php

interface QuoteProvider
{
    /**
     * @param string $author
     * @return Quote[]
     */
    public function getQuotes(string $author): array;
}