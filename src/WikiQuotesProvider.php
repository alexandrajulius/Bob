<?php

declare(strict_types=1);

final class WikiQuotesProvider implements QuoteProvider
{
    public const WIKI_QUOTE_HTTP_REQUEST_SAMUEL_BECKETT = 'https://en.wikiquote.org/w/api.php?format=json&action=parse&page=Samuel_Beckett#Waiting_for_Godot_(1952)&prop=text';
    public const WIKI_QUOTE_HTTP_REQUEST_OSCAR_WILDE = 'https://en.wikiquote.org/w/api.php?format=json&action=parse&page=Oscar_Wilde#The_Importance_of_Being_Earnest_(1895)&prop=text';

    public function getQuotes(string $author): array
    {
        $json = $this->getContentForAuthor($author);

        $response = json_decode($json, true);
        $dom = new DOMDocument();

        $htmlQuotes = [];
        foreach($this->getPayload($response, $dom, $author) as $domNode) {
            $htmlQuotes[] = $dom->saveHTML($domNode);
        }

        $quotes = [];
        foreach ($this->sanitizeHtmlQuotes($htmlQuotes) as $quote) {
            $quotes[] = new Quote($author, $quote);
        }

        return $quotes;
    }

    private function getContentForAuthor(string $author): string
    {
        if ($author !== 'Samuel Beckett') {
            return file_get_contents(self::WIKI_QUOTE_HTTP_REQUEST_OSCAR_WILDE);
        }

        return file_get_contents(self::WIKI_QUOTE_HTTP_REQUEST_SAMUEL_BECKETT);
    }

    private function getPayload(array $wikiQuotes, DOMDocument $dom, string $author): DOMNodeList
    {
        $dom->loadHTML($wikiQuotes['parse']['text']['*']);

        if ($author !== 'Samuel Beckett') {
      #      return $dom->getElementsByTagName('li');
        }

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