<?php

namespace App;

use System\Database\ORM\Model;
use System\Database\Traits\HasSoftDelete;

class Ads extends Model
{
    use HasSoftDelete;
    protected $table = "ads";
    protected $fillable = ['title', 'description', 'address', 'amount', 'image', 'floor', 'year', 'storeroom', 'balcony', 'area', 'room', 'toilet', 'parking', 'tag', 'status', 'user_id', 'cat_id', 'sell_status', 'type', 'view'];
    public function galleries()
    {
        return $this->hasMany("App\Gallery","advertise_id","id");
    }
    public function author()
    {
        return $this->belongsTo("App\User","user_id","id");
    }
    public function category()
    {
        return $this->belongsTo("App\Categories","cat_id","id");
    }
    public function sellStatus()
    {
        return $this->sell_status == 0 ? 'اجاره' : 'خرید';
    }
}