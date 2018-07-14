<?php
declare (strict_types=1);

namespace App\Tests\Unit\Service;

use App\Service\HttpFileReader;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class HttpFileReaderTest extends TestCase
{
    public function testReadFileReturnsStringResponse()
    {
        $response = $this->getTextResponse();
        $reader   = $this->getMockReader([$response]);
        $data     = $reader->readFile('http://example.com/file.txt');

        $this->assertStringStartsWith('Flatland by Edwin A. Abbott', $data);
    }

    private function getMockReader(array $responses)
    {
        $mock       = new MockHandler($responses);
        $handler    = HandlerStack::create($mock);
        $httpClient = new Client(['handler' => $handler]);

        return new HttpFileReader($httpClient);
    }

    private function getTextResponse()
    {
        return new Response(200, [], file_get_contents(__DIR__.'/../../Fixtures/flatland.txt'));
    }
}
