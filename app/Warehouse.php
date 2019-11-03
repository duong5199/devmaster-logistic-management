<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'tb_warehouse';

    protected $primaryKey = 'warehouse_id';

    public $timestamps = false;
}
