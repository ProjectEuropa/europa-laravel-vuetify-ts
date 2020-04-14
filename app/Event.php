<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

  /**
     * モデルの日付カラムの保存形式
     *
     * @var string
     */
    // protected $dateFormat = 'Y-m-d H:i';
 /**
     * 日付を変形する属性
     *
     * @var array
     */
    protected $dates = [
      'event_closing_day',
  ];
}
