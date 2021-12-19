<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Departamento;
use app\Models\PuestoTrabajo;
class Empleado extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre', 'apellidos', 'email', 'telefono', 'fecha_contratacion', 'departamento_id', 'puesto_trabajo_id'];
    
    public function departamento(){
        return $this->belongsTo(Departamento::class, 'departamento_id' );
        
    }
    
    public function puestoTrabajo(){
        return $this->belongsTo(PuestoTrabajo::class, 'puesto_trabajo_id' );
        
    }
    
    //--
    
    //public function departamentoPertenece() { //-
    //    return $this->belongs(Departamento::class, 'departamento_id');
    //}
    
    //public function departamentosJefe() { //-
    //    return $this->hasMany(Departamento::class, 'empleado_id');
    //}
    
    //public function puesto() {
    //    return $this->belongsTo(PuestoTrabajo::class, 'puesto_trabajo_id');
    //}
    
}
