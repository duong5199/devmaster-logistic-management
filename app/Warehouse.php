<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Warehouse extends Model
{
    use Notifiable;

    protected $table = 'tb_warehouse';

    protected $primaryKey = 'warehouse_id';

}
