<?php
declare (strict_types=1);

namespace App\Service;

class TextParser
{
    public function parseIntoWords(string $text): array
    {
        $matches = [];
        $numberOfMatches = preg_match_all('/[\w]+/', $text, $matches);

        if ($numberOfMatches > 0) {
            $matches = $matches[0];
        }

        return $matches;
    }

    private function parseMatches(array $matches)
    {
        $counts = [];
        foreach($matches as $match)
        {
            $match = strtolower($match);

            if (isset($counts[$match])) {
                $counts[$match]++;
            } else {
                $counts[$match] = 1;
            }
        }

        return $counts;
    }
}
