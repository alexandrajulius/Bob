<?php

declare(strict_types=1);

final class SamuelBeckett
{
    public const ESTRAGON = 'Estragon:';
    public const VLADIMIR = 'Vladimir:';
    public const POZZO = 'Pozzo:';
    public const BOY = 'Boy:';

    private $wikiQuotes;

    public function __construct(WikiQuotes $wikiQuotes)
    {
        $this->wikiQuotes = $wikiQuotes;
    }

    public function quote(): string
    {
        $wikiQuotes = $this->wikiQuotes->get();

        $dom = new DOMDocument();

        $htmlQuotes = [];
        foreach($this->getPayload($wikiQuotes, $dom) as $domNode) {
            $htmlQuotes[] = $dom->saveHTML($domNode);
        }

        $cleanQuotes = $this->sanitizeHtmlQuotes($htmlQuotes);

        return $cleanQuotes[array_rand($cleanQuotes, 1)];
    }

    private function getPayload(array $wikiQuotes, DOMDocument $dom): DOMNodeList
    {
        $dom->loadHTML($wikiQuotes['parse']['text']['*']);

        return  $dom->getElementsByTagName('p');
    }

    private function sanitizeHtmlQuotes(array $htmlQuotes): array
    {
        $names = [
            self::ESTRAGON,
            self::VLADIMIR,
            self::POZZO,
            self::BOY
        ];

        $sanitizedQuotes = [];
        foreach ($htmlQuotes as $key => &$htmlQuote) {
            $htmlQuote = strip_tags($htmlQuote);

            foreach($names as $name) {
                if (strpos($htmlQuote, $name) !== false) {
                    $htmlQuote = str_replace($name, '', $htmlQuote);
                }
            }

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