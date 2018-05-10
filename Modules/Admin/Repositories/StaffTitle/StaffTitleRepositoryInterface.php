<?php
namespace Modules\Admin\Repositories\StaffTitle;

interface StaffTitleRepositoryInterface
{
    /**
     * Get Staff Title list
     *
     * @param array $filters
     */
    public function list(array $filters=[]);

    /**
     * Add staff title
     *
     * @param number $data
     *
     */
    public function add(array $data);

    /**
     * Delete staff title
     *
     * @param number $id
     */
    public function remove($id);

    /**
     * Edit staff title
     *
     * @param number $data
     * return number $id
     */
    public function edit(array $data,$id);
    public function getEdit($id);

    public function getStaffTitleOption();
}