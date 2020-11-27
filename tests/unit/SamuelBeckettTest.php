<?php

declare(strict_types=1);

namespace Tests\unit;

use DIContainer;
use PHPUnit\Framework\TestCase;
use SamuelBeckett;

final class SamuelBeckettTest extends TestCase
{
    private $container;

    protected function getSamuelBeckett(): SamuelBeckett
    {
        $this->container = new DIContainer();
        return $this->container->getSamuelBeckett();
    }

    public function testGetsRandomBeckettQuoteFromWikiQuotes()
    {
        srand(9);
        $actualQuote = $this->getSamuelBeckett()->quote();

        $this->assertStringContainsString(
            ' (sententious.) To every man his little cross. (He sighs.)  Till he dies.  (Afterthought.) And is forgotten.',
            $actualQuote,
            'Did not get Beckett quote.'
        );
    }
}