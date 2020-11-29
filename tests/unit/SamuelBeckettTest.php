<?php

declare(strict_types=1);

namespace Tests\unit;

use DIContainer;
use PHPUnit\Framework\TestCase;
use SamuelBeckettScraper;

final class SamuelBeckettTest extends TestCase
{
    private $container;

    protected function getSamuelBeckettScraper(): SamuelBeckettScraper
    {
        $this->container = new DIContainer();
        return $this->container->getSamuelBeckettScraper();
    }

    public function testGetsSeedNineFromRandomBeckettQuote()
    {
        srand(9);
        $actualQuote = $this->getSamuelBeckettScraper()->quote();

        $this->assertStringContainsString(
            '(sententious.) To every man his little cross. (He sighs.)  Till he dies.  (Afterthought.) And is forgotten.',
            $actualQuote,
            'Did not get Beckett quote seed 9.'
        );
    }

    public function testGetsSeedThirteenFromRandomBeckettQuote()
    {
        srand(13);
        $actualQuote = $this->getSamuelBeckettScraper()->quote();

        $this->assertStringContainsString(
            'You should have been a poet.',
            $actualQuote,
            'Did not get Beckett quote seed 13.'
        );
    }
}