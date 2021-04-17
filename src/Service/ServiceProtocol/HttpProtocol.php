<?php


namespace App\Service\ServiceProtocol;


use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpProtocol implements ProtocolInterface
{
    /**
     * @var HttpClientInterface
     */
    private $client;

    public const SOURCE = "http://example.com/";

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getData()
    {
        $response = $this->client->request(
            'GET',
            self::SOURCE."get"
        );
        return $response;
    }

    public function setData($data)
    {
        $response = $this->client->request(
            'POST',
            self::SOURCE."set",
            [
                'body' => $data
            ]
        );
    }
}