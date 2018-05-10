<?php
/**
 * Created by PhpStorm.
 * User: Huy
 * Date: 4/22/2018
 * Time: 6:30 PM
 */

namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;

class AppointmentSourceTable extends Model
{
    /*
     * Table
     * Primary Key*/
    protected $table = 'appointment_source' ;
    protected $primaryKey = 'appointment_source_id';

    /*
     * fillable*/
    protected $fillable=["appointment_source_id",  "appointment_source_name","is_active","is_delete", "updated_at", "created_at"];
}