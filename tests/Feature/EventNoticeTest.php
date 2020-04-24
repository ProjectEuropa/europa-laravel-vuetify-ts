<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use Carbon\Carbon;

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
        $response = $this
        ->actingAs($user)
        ->post('/eventNotice',
            [
              'eventName'          => 'phpunit name',
              'eventDetails'       => 'phpunit details',
              'eventReferenceUrl'  => 'phpunit url',
              'eventType'          =>  1,
              'eventClosingDay'    =>  Carbon::now()->format('Y-m-d'),
              'eventDisplayingDay' =>  Carbon::now()->format('Y-m-d'),
          ]);
        $response->assertLocation('/eventnotice');

    }
}
