<?php
declare (strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\Word;
use PHPUnit\Framework\TestCase;

class WordTest extends TestCase
{
    /** @expectedException \App\Exception\InvalidWordException */
    public function testWordCannotBeCreatedWithInvalidCharacters(): void
    {
        $this->markTestIncomplete();
        new Word('test ');
    }
}
