<?php
/**
 * Created by PhpStorm.
 * User: Huy
 * Date: 4/20/2018
 * Time: 9:40 PM
 */

namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;

class AppointmentTable extends Model
{
    /*
     * Table
     * Primary Key*/
    protected $table = 'appointment' ;
    protected $primaryKey = 'appointment_id';

    /*
     * FillTable*/
    protected $fillable=["appointment_id", "customer_id","service_id", "description", "start_time", "end_time", "appointment_source_id","is_active", "updated_by", "created_by", "updated_at", "created_at"];



    /*
     * Relation
     * */
    public function Customer(){
        return $this->belongsTo("Modules\Admin\Models\CustomerTable","customer_id","customer_id");
    }

    public function Services(){
        return $this->belongsTo("Modules\Admin\Models\ServicesTable","service_id","service_id");
    }

    public function AppointmentSource(){
        return $this->belongsTo("Modules\Admin\Models\AppointmentSourceTable","appointment_source_id","appointment_source_id");
    }

    /*
     * Query*/
    public function getAppointmentList(){
        return self::with("Customer","Services","AppointmentSource")->where("is_delete",0)->get();
    }

    /*
     * CRUD*/
    public function edit($id, array $data){
        return self::where("appointment_id",$id)->update($data);
    }
}