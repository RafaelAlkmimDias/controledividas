<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Devedor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'devedor';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'documento',
        'data-de-nascimento',
        'endereco'
    ];

    public function divida(){
        return $this->hasMany(Divida::class, 'devedor_id', 'id');
    }
}
