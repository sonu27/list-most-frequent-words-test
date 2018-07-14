<?php
declare (strict_types=1);

namespace App\Tests\Unit\Service;

use App\Service\TextParser;
use PHPUnit\Framework\TestCase;

class TextParserTest extends TestCase
{
    public function testParseIntoWords()
    {
        $text = 'Imagine a vast sheet of paper on which straight Lines, Triangles,
Squares, Pentagons, Hexagons, and other figures, instead of remaining
fixed in their places, move freely about, on or in the surface, but
without the power of rising above or sinking below it, very much like
shadows--only hard with luminous edges--and you will then have a pretty
correct notion of my country and countrymen.  Alas, a few years ago, I
should have said "my universe:"  but now my mind has been opened to
higher views of things.';

        $parser = new TextParser();
        $words  = $parser->parseIntoWords($text);

        $this->assertCount(89, $words);
    }
}
