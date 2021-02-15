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
        return $this->hasMany(Divida::class, 'devedor_id', 'id')->orderBy('vencimento');
    }
    public function vencimentoAtual(){

        $json = json_decode ($this->hasMany(Divida::class, 'devedor_id', 'id')->orderBy('vencimento')->first(),1);

        if(isset($json['vencimento'])){
            return date('d/m/Y', strtotime( $json['vencimento'] ));
        }

        return "-";

    }
    public function valorAtual(){
        $json = json_decode ($this->hasMany(Divida::class, 'devedor_id', 'id')->orderBy('vencimento')->first(),1);

        if(isset($json['valor'])){
            return number_format( $json['valor'], 2, ',', '');
        }

        return "0.00";
    }
    public function valorTotal(){
        $json = json_decode ($this->hasMany(Divida::class, 'devedor_id', 'id')->sum('valor') ,1);

        if(isset($json)){
            return number_format( $json, 2, ',', '');
        }

        return "-";
    }
}
