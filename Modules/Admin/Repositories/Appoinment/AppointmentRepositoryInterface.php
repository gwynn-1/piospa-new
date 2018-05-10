<?php
/**
 * Created by PhpStorm.
 * User: Huy
 * Date: 4/20/2018
 * Time: 11:31 AM
 */

namespace Modules\Admin\Repositories\Appoinment;


interface AppointmentRepositoryInterface
{
    /**
     * Get Appointment list
     *
     * @param array $filters
     */
    public function list(array $filters = []);
    /**
     * Delete Appointment
     *
     * @param number $id
     */
    public function remove($id);
    /**
     * Add Appointment
     * @param array $data
     * @return number
     */
    public function add(array $data);
    /**
     * Update Appointment
     * @param array $data
     * @return number
     */
    public function edit(array $data, $id);
    /**
     * Update OR ADD Appointment
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