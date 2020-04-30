<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{

    use DatabaseTransactions;

    /**
     *
     * @return void
     */
    public function test_ユーザー更新テスト()
    {
        $token = Str::random(80);

        $user = factory(User::class)->create([
            'name' => 'もっっっっm',
            'api_token' => hash('sha256', $token),
        ]);

        $response = $this
            ->actingAs($user)
            ->withHeaders(
                [
                    'Authorization' => "Bearer ${token}",
                ]
            )
            ->post('/api/userUpdate',
                [
                    'name' => 'ふが',
                ]
            );
        $this->assertDatabaseMissing('users', [
            'name' => 'もっっっっm',
        ]);
    }
}
