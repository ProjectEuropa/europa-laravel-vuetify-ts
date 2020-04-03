<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UploadTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_簡易アップロードチームデータ()
    {
        $file = UploadedFile::fake()->image('hoge.che');

        $response = $this->post('/team/simpleupload', [
            'teamOwnerName' => 'M2',
            'teamComment' => 'ほげほげ',
            'teamSearchTags' => ['a', 'b'],
            'teamDeletePassWord' => 'delete',
            'teamFile' => $file,
        ]);

        $response->assertStatus(200);
    }
}
