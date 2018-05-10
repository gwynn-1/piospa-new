<?php
namespace Modules\Admin\Repositories\CustomerSource;

/**
 * Customer Group  Repository interface
 *
 * @author nhu
 * @since   2018
 */
interface CustomerSourceRepositoryInterface
{
    /**
     * Get Customer Group list
     *
     * @param array $filters
     */
    public function list(array $filters = []);
    /**
     * Delete Customer Group
     *
     * @param number $id
     */
    public function remove($id);
    /**
     * Add Customer Group
     * @param array $data
     * @return number
     */
    public function add(array $data);
    /**
     * Update Customer Group
     * @param array $data
     * @return number
     */
    public function edit(array $data, $id);
    /**
     * Update OR ADD Customer Group
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
    public function getOptionCustomerSource();


} 