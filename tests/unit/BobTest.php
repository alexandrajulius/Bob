<?php

declare(strict_types=1);

namespace Tests\unit;

use Bob;
use DIContainer;
use Generator;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

final class BobTest extends TestCase
{
    private $container;

    protected function getBob(): Bob
    {
        $this->container = new DIContainer();
        return $this->container->getBob();
    }

    public function testCanBeInstantiated(): void
    {
        Assert::assertInstanceOf(Bob::class, $this->getBob());
    }

    /**
     * @dataProvider provideConversation
     */
    public function testRepliesAccordingly(string $phrase, string $expectedReplies): void
    {
        $actualReplies = $this->getBob()->reply($phrase);

        self::assertEquals($expectedReplies, $actualReplies);
    }

    public function provideConversation(): Generator
    {
        yield 'Chill Out to more than three capital letters' => [
            'phrase' => 'STUPID BOT!',
            'expectedReply' => 'Whoa, chill out!'
        ];

        yield 'Sure to a single question mark' => [
            'phrase' => '?',
            'expectedReply' => 'Sure.'
        ];

        yield 'Sure to a question' => [
            'phrase' => 'Can you lend me money?',
            'expectedReply' => 'Sure.'
        ];

        yield 'Fine to empty words' => [
            'phrase' => ' ',
            'expectedReply' => 'Fine. Be that way!'
        ];

        yield 'Fine to even more silence' => [
            'phrase' => '     ',
            'expectedReply' => 'Fine. Be that way!'
        ];
    }
}