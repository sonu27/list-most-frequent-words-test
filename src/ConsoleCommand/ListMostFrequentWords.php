<?php
declare (strict_types=1);

namespace App\ConsoleCommand;

use App\Entity\WordCounter;
use App\Service\HttpFileReader;
use App\Service\TextParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use GuzzleHttp\Client;

class ListMostFrequentWords extends Command
{
    protected function configure()
    {
        $this
            ->setName('word-count')
            ->setDescription('')
            ->addArgument('url', InputArgument::REQUIRED, '');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $reader      = new HttpFileReader(new Client());
        $text        = $reader->readFile($input->getArgument('url'));
        $words       = (new TextParser())->parseIntoWords($text);
        $wordCounter = new WordCounter($words);
        $wordCount   = $wordCounter->getMostFrequentWords(100);

        foreach ($wordCount as $k => $v) {
            $output->writeln(sprintf('%s,%s', $k, $v));
        }
    }
}
