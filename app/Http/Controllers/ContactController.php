<?php

namespace App\Http\Controllers;

use App\Message;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        return Inertia::render('Contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string'
        ]);

        Message::create($data);

        $this->sendDiscordMessage(request('name'), request('email'), request('message'));

        return redirect()->back()->with('success', 'Your message has been sent.');
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
