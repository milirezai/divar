<?php
namespace System\Database\ORM;

use System\Database\Traits\HasAttributes;
use System\Database\Traits\HasCRUD;
use System\Database\Traits\HasSoftDelete;
use System\Database\Traits\HasRelation;
use System\Database\Traits\HasQueryBuilder;
use System\Database\Traits\HasMethodCaller;
 
 abstract class Model
 {
     use HasAttributes,HasCRUD,HasSoftDelete,HasRelation,HasQueryBuilder,HasMethodCaller;
 }
