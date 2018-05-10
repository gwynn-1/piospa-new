<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 26/03/2018
 * Time: 2:24 CH
 */

namespace Modules\Admin\Repositories\Staffs;


interface StaffRepositoryInterface
{
    /**
     * Get staff list
     *
     * @param array $filters
     */
    public function list(array $filters = []);
    /**
     * Delete staff
     *
     * @param number $id
     */
    public function remove($id);
    /**
     * Add staff
     * @param array $data
     * @return number
     */
    public function add(array $data);
    /**
     * Update staff
     * @param array $data
     * @return number
     */
    public function edit(array $data, $id);
    /**
     * Update OR ADD staff
     * @param array $data
     * @return number
     */
    public function save(array $data, $id);
    /**
     * get item
     * @param array $data
     * @return $data
     */
    public function getItem($id);

    public function getItemHasAccount($id);
    public function convertNameToSelect2();
    public function convertCodeToSelect2();
}