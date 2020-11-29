<?php

declare(strict_types=1);

final class DIContainer
{
    public function getBob(): Bob
    {
        return new Bob($this->getSamuelBeckett());
    }

    public function getSamuelBeckett(): SamuelBeckett
    {
        return new SamuelBeckett($this->getQuoteProvider());
    }

    public function getOscarWilde(): OscarWilde
    {
        return new OscarWilde($this->getQuoteProvider());
    }

    public function getQuoteProvider(): CachedQuoteProvider
    {
        return new CachedQuoteProvider($this->getWikiQuotes());
    }

    public function getWikiQuotes(): WikiQuotes
    {
        return new WikiQuotes();
    }

    public function TypeFiteQuotesProvider(): TypeFitQuotesProvider
    {
        return new TypeFitQuotesProvider();
    }
}