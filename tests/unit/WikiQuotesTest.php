<?php

declare(strict_types=1);

namespace Tests\unit;

use DIContainer;
use PHPUnit\Framework\TestCase;

final class WikiQuotesTest extends TestCase
{
    private $container;

    protected function getWikiQuotes(): \WikiQuotes
    {
        $this->container = new DIContainer();
        return $this->container->getWikiQuotes();
    }

    /**
     * @vcr wikiQuoteHttpRequest
     */
     public function testRequestsWikiQuotes()
     {
         $actualResponse = $this->getWikiQuotes()->get();

        # var_dump($actualResponse);
         $this->assertEquals(file_get_contents('./../fixtures/wikiQuoteHttpRequest', true),
             $actualResponse,
             'Did not get WikiQuotes.'
         );
     }
}
