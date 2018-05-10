<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 28/03/2018
 * Time: 11:10 AM
 */
namespace Modules\StaffAccount\Repositories\StaffAccount;

use Modules\StaffAccount\Models\StaffAccountTable;

class StaffAccountRepository implements StaffAccountRepositoryInterface
{
    protected $staffAccount;
    protected $timestamps = true;


    public function __construct(staffAccountTable $staffAccount)
    {
        $this->staffAccount = $staffAccount;
    }


    /**
     * Lấy danh sách user
     */
    public function list(array $filters = [])
    {
        return $this->staffAccount->getList($filters);
    }


    /**
     * Xóa user
     */
    public function remove($id)
    {
        $this->staffAccount->remove($id);
    }

//    public function getListProvinceOptions()
//    {
//        $this->user->getListProvinceOptions();
//    }
//
//    public function getListDistrictOptions($id)
//    {
//        $this->user->getListDistrictOptions($id);
//    }
//
//    public function getxa($id)
//    {
//        $this->user->getxa($id);
//    }
    /**
     * Thêm user
     */
    public function add(array $data)
    {
//        $data['password'] = bcrypt($data['password']);

        return $this->staffAccount->add($data);
    }

    public function  edit(array $data,$id)
    {
//        if(!empty($data['password'])){
//            $data['password']=bcrypt ($data['password']);
//        }
        return $this->staffAccount->edit($data,$id);
    }

    public function getItem($id)
    {
        // TODO: Implement getItem() method.
        return $this->staffAccount->getItem($id);
    }

    public function getNameDependOnStaffId($tennv)
    {
        return $this->staffAccount->getNameDependOnStaffId($tennv);
    }



}