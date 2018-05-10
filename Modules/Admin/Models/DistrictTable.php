<?php
/**
 * Created by PhpStorm.
 * User: SonVeratti
 * Date: 3/27/2018
 * Time: 12:45 PM
 */

namespace Modules\Admin\Models;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class DistrictTable extends Model
{
    protected $table="district";

    protected $fillable=['districtid','name','type','location','provinceid'];


    public function getOptionDistrict($id)
    {
        $a= $this->select('districtid','name','location')->where('provinceid',$id)->get();
//        dd($a);
        return $a;

    }



}