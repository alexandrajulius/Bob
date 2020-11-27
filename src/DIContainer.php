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
        return new SamuelBeckett($this->getWikiQuotes());
    }

    public function getWikiQuotes(): WikiQuotes
    {
        return new WikiQuotes();
    }
}