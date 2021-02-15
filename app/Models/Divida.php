<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Divida extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'divida';
    protected $primaryKey = 'id';

    protected $fillable = [
        'descricao-do-titulo',
        'valor',
        'vencimento',
        'devedor_id'
    ];

    public function devedor(){
        return $this->belongsTo(Devedor::class, 'id', 'devedor_id');
    }
}
