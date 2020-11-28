<?php

declare(strict_types=1);

final class Quote
{
    public $author;
    public $quote;

    public function __construct($author, $quote)
    {
        $this->author = $author;
        $this->quote = $quote;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getQuote()
    {
        return $this->quote;
    }
}