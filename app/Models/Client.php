<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'phone',
    ];

    public function enviados()
    {
        return $this->hasMany(Frete::class, 'remetente_id');
    }

    public function recebidos()
    {
        return $this->hasMany(Frete::class, 'destinatario_id');
    }
}
