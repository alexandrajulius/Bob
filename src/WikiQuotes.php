<?php

declare(strict_types=1);

final class WikiQuotes
{
    public const WIKI_QUOTE_HTTP_REQUEST = 'https://en.wikiquote.org/w/api.php?format=json&action=parse&page=Samuel_Beckett#Waiting_for_Godot_(1952)&prop=text';

    public function get(): array
    {
        $json = file_get_contents(self::WIKI_QUOTE_HTTP_REQUEST);

        return json_decode($json, true);
    }
}