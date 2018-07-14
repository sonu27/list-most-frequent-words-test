<?php
declare (strict_types=1);

namespace App\Entity;

class Word
{
    /**
     * @var string
     */
    private $word;

    public function __construct(string $word)
    {
        $this->validateWord($word);
        $this->word = $word;
    }

    private function validateWord($word)
    {

    }
}
