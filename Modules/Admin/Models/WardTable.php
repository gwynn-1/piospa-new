<?php
/**
 * Created by PhpStorm.
 * User: SonVeratti
 * Date: 3/27/2018
 * Time: 5:41 PM
 */

namespace Modules\Admin\Models;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class WardTable extends Model
{
    protected $table='ward';
    protected $fillable=['wardid','name','type','location','districtid'];

    public function getOptionWard($id)
    {
//        return $this->select('wardid','name')->where('districtid',$id)->get();
        return $this->select('wardid','name','location')->where('districtid',$id)->get();
    }
}