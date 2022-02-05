<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function userSender(){
        return $this->belongsTo(User::class, 'user_id_sender');
    }

    public function userReceiver(){
        return $this->belongsTo(User::class, 'user_id_receiver');
    }
}
