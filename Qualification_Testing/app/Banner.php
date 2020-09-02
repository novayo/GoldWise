<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Banner extends Model
{
    protected $fillable = ['guideline', 'subguideline', 'content', 'image', 'attribute', 'created_at'];

    // 幾分鐘前發布
    // https://www.wangjingxian.cn/laravel/84.html
    public function getCreatedAtAttribute($date)
    {        
        if (Carbon::now() < Carbon::parse($date)->addDays(10)) {
                return Carbon::parse($date);
        }       return Carbon::parse($date)->diffForHumans();
    }
}
