<?php
namespace App;

use System\Database\ORM\Model;

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

     protected $table = "categories";

     protected $fillable= ["name","parent_id"];

     protected $createdAT= 'created_at';

     protected $updatedAT= 'updated_at';

     protected $deletedAT= "deleted_at";
    
}