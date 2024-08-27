<?php

namespace SalatNotifier\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalatTime extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'time'];
}
