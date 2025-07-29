<?php
namespace System\Database\ORM;

use System\Database\Traits\HasAttributes;
use System\Database\Traits\HasCRUD;
use System\Database\Traits\HasRelation;
use System\Database\Traits\HasQueryBuilder;
use System\Database\Traits\HasMethodCaller;
 
 abstract class Model
 {
     use HasAttributes,HasCRUD,HasRelation,HasQueryBuilder,HasMethodCaller;
     protected $table;
     protected $fillable= [];
     protected $hidden= [];
     protected $casts= [];
     protected $primaryKey= 'id';
     protected $createdAT= 'createdAT';
     protected $updatedAT= 'updatedAT';
     protected $deletedAT= null;
     protected $collection= [];
 }
