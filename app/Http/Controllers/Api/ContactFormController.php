<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    /**
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'message' => 'required|min:3|max:1000',
        ]);

        $this->sendDiscordMessage(request('name'), request('email'), request('message'));

        return response()->json(['message' => 'success']);
    }

    /**
     * @param $name
     * @param $email
     * @param $message
     * @return \Illuminate\Http\JsonResponse|void
     */
    protected function sendDiscordMessage($name, $email, $message)
    {
        $webhook = config('portfolio.discordHook');

        $client = new Client();

        if (!$webhook) {
            return response()->json([
                'message' => 'No discord webhook provided',
            ]);
        }

        $payload = [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'username' => 'Its a me mario',
                'avatar_url' => null,
                'embeds' => [
                    [
                        'author' => [
                            'name' => $name,
                        ],
                        'description' => $message,
                        'fields' => [
                            [
                                'name' => 'Email',
                                'value' => $email,
                                'inline' => true,
                            ],
                        ],
                    ]
                ],
            ],
        ];

        try {
            $client->request('POST', $webhook, $payload);
        } catch (GuzzleException $e) {
            logger("Message send to discord failed, Name: {$name}, Email: {$email}, Message: {$message}");
        }
    }
}
