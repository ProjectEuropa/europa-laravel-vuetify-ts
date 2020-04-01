<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\File;
use Faker\Generator as Faker;

$factory->define(File::class, function (Faker $faker) {
    return [
      'upload_user_id' => 0,
      'upload_owner_name' => 'hoge',
      'file_name' => 'fuga.che',
      'file_comment' => 'flkfslkfj',
      'file_data' => '',
      'upload_type' => '1',
      'data_type' => '1',
      'delete_password' => 'hoge'
    ];
});
