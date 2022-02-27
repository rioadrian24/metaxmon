<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    
    protected $fillable = ['name', 'email', 'avatar', 'password', 'status'];

    protected $hidden = ['password'];

    
    public function last_login()
    {
        if (is_null($this->last_login)) {
            return '-';
        }
        return date('d M Y H:i', $this->last_login);
    }

    public function avatar()
    {
        if (is_null($this->avatar)) {
            return '/manage/img/undraw_profile.svg';
        }
        return Storage::url($this->avatar);
    }
}