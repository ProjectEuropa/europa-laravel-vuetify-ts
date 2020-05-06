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

        $response->assertStatus(302);
    }

    public function test_簡易アップロードマッチデータ()
    {
        $file = UploadedFile::fake()->image('hoge.che');

        $response = $this->post('/match/simpleupload', [
            'teamOwnerName' => 'M2',
            'teamComment' => 'ほげほげ',
            'teamSearchTags' => ['a', 'b'],
            'teamDeletePassWord' => 'delete',
            'teamFile' => $file,
        ]);

        $response->assertStatus(302);
    }

    public function test_アップロードチームデータ()
    {
        $file = UploadedFile::fake()->image('hoge.che');

        $response = $this->post('/team/upload', [
            'teamOwnerName' => 'M2',
            'teamComment' => 'ほげほげ',
            'teamSearchTags' => ['a', 'b'],
            'teamDeletePassWord' => 'delete',
            'teamFile' => $file,
        ]);

        $response->assertStatus(302);
    }

    public function test_アップロードマッチデータ()
    {
        $file = UploadedFile::fake()->image('hoge.che');

        $response = $this->post('/match/upload', [
            'teamOwnerName' => 'M2',
            'teamComment' => 'ほげほげ',
            'teamSearchTags' => ['a', 'b'],
            'teamDeletePassWord' => 'delete',
            'teamFile' => $file,
        ]);

        $response->assertStatus(302);
    }    
}
