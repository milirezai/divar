<?php

namespace App;

use System\Database\ORM\Model;
use System\Database\Traits\HasSoftDelete;

class Post extends Model
{
    use HasSoftDelete;
    protected $table = 'posts';
    protected $fillable = ['title','body','image','user_id','cat_id','published_at','status'];
    protected $casts = ['img' => 'array'];
    public function author()
    {
        return $this->belongsTo("\App\User","user_id","id");
    }
    public function category()
    {
        return $this->belongsTo("\App\Categories","cat_id","id");
    }
}