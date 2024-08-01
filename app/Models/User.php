<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'clave',
    ];

    protected $hidden = [
        'clave',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setClaveAttribute($value)
    {
        $this->attributes['clave'] = Hash::make($value);
    }

    public function getAuthPassword()
    {
        return $this->clave;
    }
}
