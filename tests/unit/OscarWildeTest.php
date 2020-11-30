<?php

declare(strict_types=1);

namespace Tests\unit;

use DIContainer;
use OscarWildeScraper;
use PHPUnit\Framework\TestCase;

final class OscarWildeTest extends TestCase
{
    private $container;

    protected function getOscarWildeScraper(): OscarWildeScraper
    {
        $this->container = new DIContainer();
        return $this->container->getOscarWildeScraper();
    }

    public function testGetsSeedNineFromRandomBeckettQuote()
    {
        srand(9);
        $actualQuote = $this->getOscarWildeScraper()->quote();

        $this->assertStringContainsString(
            '(sententious.) To every man his little cross. (He sighs.)  Till he dies.  (Afterthought.) And is forgotten.',
            $actualQuote,
            'Did not get Beckett quote seed 9.'
        );
    }
}