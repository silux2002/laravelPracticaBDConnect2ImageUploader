<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombredepartamento', 'localizacion'];
    
    
    public function empleado(){
        return $this->hasMany(Empleado::class);
    }
    
    //--
    
    //public function empleados() { //s
    //    return $this->hasMany(Empleado::class, 'departamento_id');
    //}
    
    //public function jefeDepartamento() { //-
    //    return $this->belongsTo(Empleado::class, 'empleado_id');
    //}
    
}
