<?php


namespace App\Traits;


use GuzzleHttp\Client;

trait GuzzleTrait
{
    public function guzzleGetJson($url, $params = [])
    {
        $client = new Client([
            'headers' => [
                'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36'
            ]
        ]);

        $data = $client->request('get', $url);

        return json_decode($data->getBody());
    }
}
