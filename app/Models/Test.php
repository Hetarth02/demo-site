<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Test extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'test1';
    protected $guarded = [];
}
