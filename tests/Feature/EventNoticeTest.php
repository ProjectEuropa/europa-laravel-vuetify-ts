<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class EventNoticeTest extends TestCase
{
  use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class, 'default')->create();
        $now  = now()->format('Y-m-d');
        $response = $this
        ->actingAs($user)
        ->post('/eventNotice',
            [
              'eventName'          => 'phpunit name',
              'eventDetails'       => 'phpunit details',
              'eventReferenceUrl'  => 'phpunit url',
              'eventType'          =>  1,
              'eventClosingDay'    =>  $now,
              'eventDisplayingDay' =>  $now,
          ]);
        $this->assertDatabaseHas('events', [
            'event_name'           => 'phpunit name',
            'event_details'        => 'phpunit details',
            'event_reference_url'  => 'phpunit url',
            'event_type'           =>  1,
            'event_closing_day'    =>  $now,
            'event_displaying_day' =>  $now,
        ]);
        $response->assertLocation('/eventnotice');
    }
}
