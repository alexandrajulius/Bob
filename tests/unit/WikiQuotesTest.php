<?php

declare(strict_types=1);

namespace Tests\unit;

use DIContainer;
use PHPUnit\Framework\TestCase;
use Quote;

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
    public function testReturnsArrayOfQuotes()
    {
        \VCR\VCR::configure()->setMode(\VCR\VCR::MODE_NONE);

        $actualQuotes = $this->getWikiQuotes()->getQuotes();

        foreach ($actualQuotes as $quote) {
            self::assertInstanceOf(\Quote::class, $quote);
        }

        $expectedQuote = (new Quote('Samuel Beckett', 'Samuel Beckett (13 April 1906 â 22 December 1989) was an Irish playwright, novelist, poet and winner of the 1969 Nobel Prize in Literature. He wrote mainly in English and French.'));

        self::assertEquals($expectedQuote, $actualQuotes[0], 'First element of Quotes array does not match.');
    }
}
