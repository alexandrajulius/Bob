<?php

declare(strict_types=1);

final class WikiQuotes
{
    public const WIKI_QUOTE_HTTP_REQUEST = 'https://en.wikiquote.org/w/api.php?format=json&action=parse&page=Samuel_Beckett#Waiting_for_Godot_(1952)&prop=text';
    public const AUTHOR = 'Samuel Beckett';
    public const CACHE_FILE = './data/samuelBeckett.txt';

    //create decorator to inject author
    public const WIKI_QUOTE_HTTP_REQUEST_OSCAR_WILDE = 'https://en.wikiquote.org/w/api.php?format=json&action=parse&page=Oscar_Wilde#The_Importance_of_Being_Earnest_(1895)&prop=text';
    public const AUTHOR_OSCAR_WILDE = 'Oscar Wilde';
    public const CACHE_FILE_OSCAR_WILDE = './data/oscarWilde.txt';

    /**
     * @return Quote[]
     */
    public function getQuotes(): array
    {
        $json = $this->getWikiQuotes();
        $response = json_decode($json, true);
        $dom = new DOMDocument();

        $htmlQuotes = [];
        foreach($this->getPayload($response, $dom) as $domNode) {
            $htmlQuotes[] = $dom->saveHTML($domNode);
        }

        $quotes = [];
        foreach ($this->sanitizeHtmlQuotes($htmlQuotes) as $quote) {
            $quotes[] = new Quote(self::AUTHOR, $quote);
        }

        return $quotes;
    }

    private function getWikiQuotes(): string
    {
        $cachedWikiQuotes = file_get_contents(self::CACHE_FILE, true);

        if (!isset($cachedWikiQuotes) || $cachedWikiQuotes === '') {
            file_put_contents(
                self::CACHE_FILE,
                file_get_contents(self::WIKI_QUOTE_HTTP_REQUEST_OSCAR_WILDE).PHP_EOL ,
                FILE_APPEND | LOCK_EX
            );

            return file_get_contents(self::CACHE_FILE);
        }

        return $cachedWikiQuotes;
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