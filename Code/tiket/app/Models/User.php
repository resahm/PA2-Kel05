<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles; 

class User extends Authenticatable
{
    use HasRoles,Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'gender',
        'identity_number',
        'birthdate',
        'password',
        'role',
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
            'role' => 'required|string',
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
            'role' => $data['role'],
        ]);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
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
