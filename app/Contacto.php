<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'telefono', 'direccion', 'categoria', 'user_id'
    ];

    public function getFullNameAttribute()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function scopeName($query, $name)
    {
        if(trim($name) != ""){
            $query->where(\DB::raw("CONCAT(contactos.firstName, ' ', contactos.lastName)"),"LIKE", "%$name%");
        }
    }

    public function scopeCategoria($query, $categoria)
    {
        $categorias = config('options.categoria');

        if($categoria != "" && isset($categorias[$categoria])){
            $query->where('categoria', $categoria);
        }
    }

}
