<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerSetting extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'link_whitepaper', 'link_trustlink', 'thumbnail'];
}
