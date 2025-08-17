<?php

namespace App;

use System\Database\ORM\Model;
use System\Database\Traits\HasSoftDelete;

class Gallery extends Model
{
    use HasSoftDelete;

    protected $table = 'galleries';

    protected $fillable = ['image', 'advertise_id'];

    public function ads()
    {
        return $this->belongsTo("App\Ads","advertise_id",'id');
    }
}