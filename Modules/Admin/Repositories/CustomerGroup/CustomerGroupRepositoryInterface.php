<?php
namespace Modules\Admin\Repositories\CustomerGroup;

/**
 * Customer Group  Repository interface
 *
 * @author thach
 * @since   2018
 */
interface CustomerGroupRepositoryInterface
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

} 