<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password', 'rol'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'rememberToken',
    ];

    public function getFullNameAttribute()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function setPasswordAttribute($value)
    {
        if(!empty($value)){
            $this->attributes['password'] = \Hash::make($value);
        } 
    }

    public function scopeName($query, $name)
    {
        if(trim($name) != ""){
            $query->where(\DB::raw("CONCAT(firstName, ' ', lastName)"),"LIKE", "%$name%");
        }
    }

    public function scopeRol($query, $rol)
    {
        $roles = config('options.rol');

        if($rol != "" && isset($roles[$rol])){
            $query->where('rol', $rol);
        }
    }

    public function isAdmin()
    {
        return $this->rol === 'Administrador';
    }
    
}
