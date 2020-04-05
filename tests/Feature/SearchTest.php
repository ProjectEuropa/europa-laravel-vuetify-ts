<?php

namespace Tests\Feature;

use Tests\TestCase;

class SearchTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_検索のテスト()
    {
        $response = $this->json('GET', '/api/search');

        $json = (json_decode($response->getContent()));

        $this->assertObjectHasAttribute('current_page', $json);
        $this->assertObjectHasAttribute('data', $json);
        $this->assertObjectHasAttribute('first_page_url', $json);
        $this->assertObjectHasAttribute('from', $json);
        $this->assertObjectHasAttribute('last_page_url', $json);
        $this->assertObjectHasAttribute('next_page_url', $json);
        $this->assertObjectHasAttribute('path', $json);
        $this->assertObjectHasAttribute('per_page', $json);
        $this->assertObjectHasAttribute('prev_page_url', $json);
        $this->assertObjectHasAttribute('to', $json);
        $this->assertObjectHasAttribute('total', $json);
        $this->assertObjectHasAttribute('id', $json->data[0]);
        $this->assertObjectHasAttribute('upload_owner_name', $json->data[0]);
        $this->assertObjectHasAttribute('file_name', $json->data[0]);
        $this->assertObjectHasAttribute('file_comment', $json->data[0]);
        $this->assertObjectHasAttribute('created_at', $json->data[0]);
        $this->assertObjectHasAttribute('upload_user_id', $json->data[0]);
        $this->assertObjectHasAttribute('search_tag1', $json->data[0]);
        $this->assertObjectHasAttribute('search_tag2', $json->data[0]);
        $this->assertObjectHasAttribute('search_tag3', $json->data[0]);
        $this->assertObjectHasAttribute('search_tag4', $json->data[0]);
    }
}
