<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Mindscms\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    use HasFactory;

    protected $guarded = [];
}
