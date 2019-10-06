<?php


namespace App;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Discord
{
    protected $payload = [
        'headers' => ['Content-Type' => 'application/json'],
        'json' => [
//            'content' => "New job !",
            'username' => 'Its a me mario',
            'avatar_url' => null,
            'embeds' => [

            ],
        ],
    ];

    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function embed(array $data)
    {
        $this->payload['json']['embeds'][] = $data;

        return $this;
    }

    public function username($username)
    {
        $this->payload['json']['username'] = $username;

        return $this;
    }

    public function send()
    {
        try {
            $this->client->request('POST', config('job.discordWebhook'), $this->payload);
        } catch (GuzzleException $e) {
            logger('discord call failed ' . $e->getMessage());
        }
    }

    /**
     * @param $webhook
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws GuzzleException
     */
    public function sendTest($webhook)
    {
        return $this->client->request('POST', $webhook, $this->payload);
    }
}
