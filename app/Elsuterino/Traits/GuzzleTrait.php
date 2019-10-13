<?php


namespace Elsuterino\Traits;


use GuzzleHttp\Client;

trait GuzzleTrait
{
    public function guzzleGetJson($url, $params = [])
    {
        $client = new Client();

        $data = $client->request('get', $url);

        return json_decode($data->getBody());
    }
}
