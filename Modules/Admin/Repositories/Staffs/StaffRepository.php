<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 13/03/2018
 * Time: 1:48 CH
 */

namespace Modules\Admin\Repositories\Staffs;

use Modules\Admin\Models\StaffAccountTable;
use Modules\Admin\Models\StaffTable;


class StaffRepository implements StaffRepositoryInterface
{

    /**
     * @var staffTable
     */
    protected $staff;
    protected $staffAccount;
    protected $timestamps = true;
    public function __construct(StaffTable $staff, StaffAccountTable $staffAccountTable)
    {
        $this->staff = $staff;
        $this->staffAccount = $staffAccountTable;
    }
    /**
     *get list customer Group
     */
    public function list(array $filters = [])
    {
        return $this->staff->getList($filters);
    }
    /**
     * delete customer Group
     */
    public function remove($id)
    {
        $oItem = $this->staff->getItem($id);
        if(!empty($oItem->customer_group_image)){
            if(is_file(public_path().'/'.$oItem->customer_group_image.'')){
                unlink(public_path().'/'.$oItem->customer_group_image.'');
            }
        }
        $this->staff->remove($id);
    }
    /**
     * add customer Group
     */
    public function add(array $data)
    {

        if($data['password'] != $data['password_confirmation']) return false ;
        $account = array(
            'username'   => $data['username'],
            'password'   => bcrypt($data['password']),
            'store_id'   => !empty($data['store_id']) ? $data['store_id']: 0 ,
            'created_at' => date('Y-m-d H:i:s')
        );
        $data['staff_account_id']   = $this->staffAccount->saveAccount($account,null);
        $object['staff_id']         = $this->staff->add($data) ;
        if($object['staff_id']){
            $this->staffAccount->saveAccount($object ,$data['staff_account_id']);
        }
        return $object;
    }
    /*
     * edit customer Group
     */
    public function edit(array $data ,$id)
    {
        // check has image remove

        var_dump($data);
        die();
        if(!empty($data['customer_group_image'])){
            $oItem = $this->staff->getItem($id);
            if(!empty($oItem->customer_group_image)){
                if(is_file(public_path().'/'.$oItem->customer_group_image.'')){
                    unlink(public_path().'/'.$oItem->customer_group_image.'');
                }
            }
        }
        try{
            return $this->staff->edit($data ,$id);
        }
        catch(\Exception  $e){
            $e->getMessage();
        }
    }
    /*
     *  update or add
     */
    public function save(array $data ,$id)
    {
        if(!empty($id)){
            return $this->staff->edit($data ,$id);
        }else{

            return $this->staff->add($data);
        }
    }
    public function getItem($id)
    {
        return $this->staff->getItem($id);
    }


    public function getItemHasAccount($id)
    {
        return $this->staff->getItemHasAccount($id);
    }

    public function convertNameToSelect2()
    {
        $array=array();
        foreach ($this->staff->convertNameToSelect2() as $value) { //bien $value se bang gia tri tra ve cua ham getOptionMemberLevel
            $array[$value['staff_id']]=$value['fullname'];//ma ham getOptionMemberLevel truy van database tra ve MEMBER_ID va Member_name
        }           //=> bien $value se co gia tri mang [member_id,member_name]
        return $array;// sau do ta tra ve vong lap foreach theo gia tri id va name cua value

    }

    public function convertCodeToSelect2()
    {
        $array=array();
        foreach ($this->staff->convertCodeToSelect2() as $value) { //bien $value se bang gia tri tra ve cua ham getOptionMemberLevel
            $array[$value['staff_id']]=$value['code'];//ma ham getOptionMemberLevel truy van database tra ve MEMBER_ID va Member_name
        }           //=> bien $value se co gia tri mang [member_id,member_name]
        return $array;// sau do ta tra ve vong lap foreach theo gia tri id va name cua value

    }
}