<?php
declare (strict_types=1);

namespace App\Service;

use GuzzleHttp\ClientInterface;

class HttpFileReader implements FileReaderInterface
{
    /** @var ClientInterface */
    private $client;

    /**
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function readFile(string $url): string
    {
        return (string)$this->client->request('GET', $url)->getBody();
    }
}
