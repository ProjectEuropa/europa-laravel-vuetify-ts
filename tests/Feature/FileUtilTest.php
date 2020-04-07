<?php

namespace Tests\Feature;

use App\File;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class FileUtilTest extends TestCase
{

    use DatabaseTransactions;

    /**
     *
     *
     * @return void
     */
    public function test_削除のテスト()
    {

        factory(File::class, 50)->create();

        $file = factory(File::class, 1)->create(
            [
                'delete_password' => 'fuga',
            ]
        )[0];

        // 削除失敗
        $response = $this->post('/api/delete/searchFile',
            [
                'id' => $file->id,
                'deletePassword' => 'aaabbb',
            ]);

        $this->assertDatabaseHas('files', [
            'id' => $file->id,
        ]);

        // 削除成功
        $response = $this->post('/api/delete/searchFile',
            [
                'id' => $file->id,
                'deletePassword' => 'fuga',
            ]);

        $this->assertDatabaseMissing('files', [
            'id' => $file->id,
        ]);
    }
}
