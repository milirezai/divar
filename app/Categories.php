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

     protected $createdAT= 'createdAT';

     protected $updatedAT= 'updatedAT';

     protected $deletedAT= "deleted_at";
    
}