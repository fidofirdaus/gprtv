<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = ['hari', 'mulai', 'selesai', 'acara'];
}
