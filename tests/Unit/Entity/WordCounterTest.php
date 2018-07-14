<?php
declare (strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\WordCounter;
use PHPUnit\Framework\TestCase;

class WordCounterTest extends TestCase
{
    public function testWordCounterCounts()
    {
        $words       = ['test', 'me', 'test', 'zero', 'go', 'go', 'test'];
        $wordCounter = new WordCounter($words);
        $wordCount   = $wordCounter->getMostFrequentWords(100);

        $this->assertCount(4, $wordCount);
        $this->assertEquals(3, $wordCount['test']);
        $this->assertEquals(1, $wordCount['me']);
    }

    public function testWordCounterOrder()
    {
        $words       = ['two', 'test', 'once', 'test', 'two', 'go', 'go', 'test'];
        $wordCounter = new WordCounter($words);
        $wordCount   = $wordCounter->getMostFrequentWords(100);
        $wordOrder   = array_keys($wordCount);

        $this->assertEquals('test', $wordOrder[0]);
        $this->assertEquals('once', $wordOrder[3]);
    }

    public function testWordCounterNumberReturned()
    {
        $words       = ['two', 'test', 'once', 'test', 'two', 'go', 'go', 'test'];
        $wordCounter = new WordCounter($words);
        $wordCount   = $wordCounter->getMostFrequentWords(2);

        $this->assertCount(2, $wordCount);
    }
}
