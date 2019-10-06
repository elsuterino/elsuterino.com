<?php

namespace Tests\Feature;

use App\Discord;
use Tests\TestCase;

class DiscordTest extends TestCase
{
    protected $discordTestWebhook = 'https://discordapp.com/api/webhooks/630365150490263572/jKCSdTL4mfIH5Ssckay1t0PMbTMaYZc3jhisCCrUPnHawkz39JJ7nl2B72zVGEwtEVWv';

    /** @test * */
    public function it_can_send_embeded_message()
    {
        $discord = new Discord();

        $response = $discord->embed(['title' => 'title test'])->sendTest($this->discordTestWebhook);

        $this->assertEquals($response->getStatusCode(), 204);
    }
}
