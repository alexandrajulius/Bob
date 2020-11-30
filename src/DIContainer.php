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

    public function getQuoteProvider(): CachedQuoteProvider
    {
        return new CachedQuoteProvider($this->getWikiQuoteProvider());
    }

    public function getWikiQuoteProvider(): WikiQuoteProvider
    {
        return new WikiQuoteProvider();
    }
}