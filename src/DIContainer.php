<?php

declare(strict_types=1);

final class DIContainer
{
    public function getBob(): Bob
    {
        return new Bob($this->getSamuelBeckettScraper());
    }

    public function getSamuelBeckettScraper(): SamuelBeckettScraper
    {
        return new SamuelBeckettScraper($this->getQuoteProvider());
    }

    public function getOscarWildeScraper(): OscarWildeScraper
    {
        return new OscarWildeScraper($this->getQuoteProvider());
    }

    public function getQuoteProvider(): CachedQuoteProvider
    {
        return new CachedQuoteProvider($this->getWikiQuotesProvider());
    }

    public function getWikiQuotesProvider(): WikiQuotesProvider
    {
        return new WikiQuotesProvider();
    }

    public function TypeFiteQuotesProvider(): TypeFitQuotesProvider
    {
        return new TypeFitQuotesProvider();
    }
}