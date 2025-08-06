<?php
namespace App;

use System\Database\ORM\Model;
use System\Database\Traits\HasSoftDelete;

/*
|--------------------------------------------------------------------------
| class User
|--------------------------------------------------------------------------
|
| Models represent database tables
| They inherit from the original model
|
*/

class Categories extends Model
{
    use HasSoftDelete;

     protected $table = "categories";

     protected $fillable= ["name","parent_id"];

     public function parent()
     {
         return $this->belongsTo('\App\Categories',"parent_id","id");
     }

}