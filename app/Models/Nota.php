<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'grado_id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso1_id');
    }

    public function curso2()
    {
        return $this->belongsTo(Curso::class, 'curso2_id');
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }
    public function scopeSearch ($query, array $params)
    {
        $query->where(function ($query) use ($params){
            $query->when($params('name')?? false,function ($query,$name){
                $filters = explode('',$name);
                $query->where('id','LIKE','%'.$filters[0].'%')
                    ->orwhere('nombre','LIKE','%'.$filters[1].'%');
            });
        })
            ->when($params('alumnos')?? false, function ($query, $alumnos){
                $query->whereExists(function ($query)use ($alumnos){
                    $query->from('alumnos')
                        ->whereColumn('alumnos.id')
                        ->where('alumnos.nombre','LIKE',"%{$alumnos}%");
                });
            });
    }
}
