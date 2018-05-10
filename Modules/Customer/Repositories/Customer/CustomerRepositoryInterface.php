<?php
/**
 * Created by PhpStorm.
 * User: nhu
 * Date: 03/04/2018
 * Time: 16:51
 */

namespace Modules\Customer\Repositories\Customer;

interface CustomerRepositoryInterface
{
    /**
     * Get Customer  list
     *
     * @param array $filters
     */
    public function list(array $filters = []);
    /**
     * Delete Customer
     *
     * @param number $id
     */
    public function remove($id);
    /**
     * Add Customer
     * @param array $data
     * @return number
     */
    public function add(array $data);
    /**
     * Update Customer
     * @param array $data
     * @return number
     */
    public function edit(array $data, $id);
    /**
     * Update OR ADD Customer
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

}