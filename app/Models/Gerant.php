<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Gerant extends Authenticatable
{
    use HasFactory, Notifiable;
}
