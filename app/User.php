<?php
namespace App;

use ArrayObject;
use System\Database\ORM\Model;

class User extends Model
{
    protected $table= "users";
    protected $fillable= ["title", "body", "cat_id"];
    protected $casts= [];

    public function roles()
    {
        return $this->belongsToMany("\App\Role","user_role","id","user_id","role_id","id");
    }
}