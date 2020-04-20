<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Event;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventTest extends TestCase
{
  use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        factory(Event::class, 30)->create();
        // チーム
        $response = $this->json('GET', '/api/event');
        $json = (json_decode($response->getContent()));

        $this->assertObjectHasAttribute('event_name', $json->data[0]);
        $this->assertObjectHasAttribute('event_details', $json->data[0]);
        $this->assertObjectHasAttribute('event_closing_day', $json->data[0]);
        $this->assertObjectHasAttribute('event_reference_url', $json->data[0]);
    }
}
