<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'gender',
        'identity_number',
        'birthdate',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function createUser($data)
    {
        // Validasi input
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string',
            'gender' => 'required|in:laki-laki,perempuan',
            'identity_number' => 'required|string',
            'birthdate' => 'required|date',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return null;
        }

        return self::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'gender' => $data['gender'],
            'identity_number' => $data['identity_number'],
            'birthdate' => $data['birthdate'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    public function hasAnyRole($roles)
    {
        return $this->roles->whereIn('name', $roles)->isNotEmpty();
    }
}
