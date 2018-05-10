<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 27/03/2018
 * Time: 12:41 CH
 */

namespace Modules\StaffAccount\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class StaffAccountTable extends  Model
{
    use ListTableTrait;

    protected $table        = 'staff_account' ;
    protected $primaryKey   = 'staff_account_id';
    protected $fillable = ['staff_account_id', 'staff_id', 'username', 'password', 'store_id', 'is_admin', 'is_active','is_delete','date_last_login', 'created_at', 'updated_at', 'created_by', 'updated_by'];

    protected $hidden = [
        'password', 'remember_token',
    ];


    protected function _getList()
    {
//        return $this->select('id', 'name', 'email', 'is_active', 'created_at', 'updated_at');

        $oSelect  = $this->from('staff_account as sa')
            ->leftjoin('staffs','staffs.staff_id','=','sa.staff_id')
            ->leftjoin('stores','stores.store_id','=','sa.store_id')

            ->select('stores.store_name as store_name','sa.staff_account_id as staff_account_id','staffs.fullname as fullname', 'username','is_admin','sa.is_active as is_active','sa.created_at')->where('sa.is_delete',0);
        return $oSelect;



    }

    public function saveAccount(array $data, $id){
        if($id){
            return $this->edit($data, $id);
        }else{

            return $this->add($data);
        }
    }
    // note function này dùng chung chỉ có tác dụng add


    public function add(array  $data){
        $object = $this->create($data);
        return  $object->staff_account_id;

    }

    public function getNameDependOnStaffId($tennv)
    {
        $hi = DB::table('staffs')->select('staff_id')->where('fullname','=',$tennv)->first();

        return $hi->staff_id; //chi de lay 1 truong staff_id
                                //neu khong ham se tra ve 1 doi tuong va khong the them vao $data

//        $oSelect  = $this->from('staffs')
//            ->select('staff_id')->where('fullname','=',$tennv);
//        return $oSelect;
    }


    public function edit(array $data ,$id){
        return $this->where($this->primaryKey,$id)->update($data);
    }

    /**
     * Remove user
     *
     * @param number $id
     */
    public function remove($id)
    {
        return $this->where($this->primaryKey,$id )->update(['staff_account.is_delete'=> 1]);   // $this-> tuc la select cai bang productGroupTable hien tai
    }




    public function getItem($id){
        return  $this->where($this->primaryKey,$id)->first();
    }


}