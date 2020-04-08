<?php

namespace Tests\Feature;

use App\File;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DownloadTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * .
     *
     * @return void
     */
    public function test_ファイルダウンロードテスト()
    {

        factory(File::class, 50)->create();
        $file = File::select('id')->inRandomOrder()->first();

        $response = $this->get("/auto/download/{$file->id}");

        $response->assertStatus(200);
    }
}
