<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdSetting extends Model
{
    use HasFactory;
    protected $table = 'ad_settings';
    protected $guarded = [];
}
