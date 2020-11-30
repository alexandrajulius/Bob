<?php

declare(strict_types=1);

namespace Tests\unit;

use DIContainer;
use PHPUnit\Framework\TestCase;
use Quote;
use VCR\VCR;

final class WikiQuotesTest extends TestCase
{
    private $container;

    protected function getQuoteProvider(): \QuoteProvider
    {
        $this->container = new DIContainer();
        return $this->container->getQuoteProvider();
    }

    /**
     * @vcr wikiQuoteHttpRequestBeckett
     */
    public function testReturnsArrayOfQuotes()
    {
        VCR::configure()->setMode(VCR::MODE_NONE);

        $actualQuotes = $this->getQuoteProvider()->getQuotes('Samuel Beckett');

        foreach ($actualQuotes as $quote) {
            self::assertInstanceOf(Quote::class, $quote);
        }

        $expectedQuote = (new Quote('Samuel Beckett', 'Samuel Beckett (13 April 1906 â 22 December 1989) was an Irish playwright, novelist, poet and winner of the 1969 Nobel Prize in Literature. He wrote mainly in English and French.'));

        self::assertEquals($expectedQuote, $actualQuotes[0], 'First element of Quotes array does not match.');
    }

    /**
     * @vcr wikiQuoteHttpRequestWilde
     */
    public function testReturnsArrayOfOscarWildeQuotes()
    {
        VCR::configure()->setMode(VCR::MODE_ONCE);

        $actualQuotes = $this->getQuoteProvider()->getQuotes('Oscar Wilde');

        foreach ($actualQuotes as $quote) {
            self::assertInstanceOf(Quote::class, $quote);
        }

        $expectedQuote = (new Quote('OscarWilde', 'Oscar Fingal O\'Flahertie Wills Wilde (16 October 1854 â 30 November 1900) was an Irish essayist, novelist, playwright and poet.'));

        self::assertEquals($expectedQuote, $actualQuotes[0], 'First element of Quotes array does not match.');
    }
}
