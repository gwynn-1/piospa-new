<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 28/03/2018
 * Time: 11:10 AM
 */
namespace Modules\StaffAccount\Repositories\StaffAccount;

Interface StaffAccountRepositoryInterface
{
    public function list(array $filters = []);


    /**
     * Delete user
     *
     * @param number $id
     */
    public function remove($id);


    /**
     * Add user
     *
     * @param array $data
     * @return number
     */
    public function add(array $data);

    public function edit(array $data,$id);

    public function getItem($id);

    public function getNameDependOnStaffId($tennv);
}