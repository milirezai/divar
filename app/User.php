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

class User extends Model
{

    /*
    |--------------------------------------------------------------------------
    | Property table
    |--------------------------------------------------------------------------
    |
    | Models represent database tables
    | Stores the table name represented by this class.
    |
    */
     protected $table = "users";

    /*
    |--------------------------------------------------------------------------
    | Property fillable
    |--------------------------------------------------------------------------
    |
    | We specify the required fields
    | that need filling
    |
    */
    protected $fillable = ['email', 'first_name', 'last_name', 'avatar', 'status', 'is_active', 'password', 'verify_token', 'user_type', 'remember_token', 'remember_token_expire'];

    /*
    |--------------------------------------------------------------------------
    | Property hidden 
    |--------------------------------------------------------------------------
    |
    | Key information fields
    | and specify the need for data privacy
    |
    */
     protected $hidden= [];

    /*
    |--------------------------------------------------------------------------
    | Property casts
    |--------------------------------------------------------------------------
    |
    |
    |
    */
     protected $casts= [];

    /*
    |--------------------------------------------------------------------------
    | Property primaryKey
    |--------------------------------------------------------------------------
    |
    | The primaryKey table is essential
    | The default is ID
    | It is changeable
    | But it is not recommended.
    |
    */
     protected $primaryKey= 'id';

    /*
    |--------------------------------------------------------------------------
    | Property createdAT , updatedAT , deletedAT
    |--------------------------------------------------------------------------
    |
    | These fields are key
    | Default values are specified
    | Their values are set when a column is created, updated, or deleted from the table
    | They are automatically quantified
    |
    */
}