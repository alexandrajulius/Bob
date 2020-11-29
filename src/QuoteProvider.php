<?php

interface QuoteProvider
{
    /**
     * @param string $author
     * @param string $book
     *
     * @return Quote[]
     */
    public function getQuotes(string $author, string $book): array;
}