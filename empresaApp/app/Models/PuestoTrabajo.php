<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuestoTrabajo extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombrepuesto', 'salariomin', 'salariomax'];
    
    public function empleado(){
        return $this->hasMany(Empleado::class);
    }
    
    //--
    
    //1º se suele poner la s final por que es de uno a muchos
    //2º se tiene que poner el campo de la clave foránea, si no es exactamente el nombre que laravel utiliza como predeterminado
    //public function empleados() {
    //    return $this->hasMany(Empleado::class, 'puesto_trabajo_id');
    //}
}
