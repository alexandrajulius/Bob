<?php

declare(strict_types=1);

final class WikiQuoteProvider implements QuoteProvider
{
    public const WIKI_QUOTE_HTTP_REQUEST_SAMUEL_BECKETT = 'https://en.wikiquote.org/w/api.php?format=json&action=parse&page=Samuel_Beckett#Waiting_for_Godot_(1952)&prop=text';

    public function getQuotes(string $author): array
    {
        $json = file_get_contents(self::WIKI_QUOTE_HTTP_REQUEST_SAMUEL_BECKETT);

        $response = json_decode($json, true);
        $dom = new DOMDocument();

        $htmlQuotes = [];
        foreach($this->getPayload($response, $dom) as $domNode) {
            $htmlQuotes[] = $dom->saveHTML($domNode);
        }

        $quotes = [];
        foreach ($this->sanitizeHtmlQuotes($htmlQuotes) as $quote) {
            $quotes[] = new Quote($author, $quote);
        }

        return $quotes;
    }

    private function getPayload(array $wikiQuotes, DOMDocument $dom): DOMNodeList
    {
        $dom->loadHTML($wikiQuotes['parse']['text']['*']);

        return $dom->getElementsByTagName('p');
    }

    private function sanitizeHtmlQuotes(array $htmlQuotes): array
    {
        $sanitizedQuotes = [];
        foreach ($htmlQuotes as $key => &$htmlQuote) {
            $htmlQuote = strip_tags($htmlQuote);

            $htmlQuotesArray = explode("\n", $htmlQuote);

            foreach ($htmlQuotesArray as $htmlQuoteString) {
                if ($htmlQuoteString !== '') {
                    $sanitizedQuotes[] = $htmlQuoteString;
                }
            }
        }

        return $sanitizedQuotes;
    }
}