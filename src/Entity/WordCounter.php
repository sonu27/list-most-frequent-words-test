<?php
declare (strict_types=1);

namespace App\Entity;

class WordCounter
{
    /** @var array */
    private $wordCount;

    /**
     * @param array $words
     */
    public function __construct(array $words)
    {
        $this->countWords($words);
    }

    /**
     * @param int $number
     *
     * @return array
     */
    public function getMostFrequentWords(int $number): array
    {
        arsort($this->wordCount);

        return array_slice($this->wordCount, 0, $number);
    }

    /**
     * @param array $words
     */
    private function countWords(array $words): void
    {
        $this->wordCount = [];
        foreach ($words as $word) {
            $word = strtolower($word);

            if (isset($this->wordCount[$word])) {
                $this->wordCount[$word]++;
            } else {
                $this->wordCount[$word] = 1;
            }
        }
    }
}
