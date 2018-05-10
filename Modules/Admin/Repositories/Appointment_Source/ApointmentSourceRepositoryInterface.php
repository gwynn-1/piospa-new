<?php
/**
 * Created by PhpStorm.
 * User: Huy
 * Date: 4/22/2018
 * Time: 6:09 PM
 */

namespace Modules\Admin\Repositories\Appointment_Source;


interface ApointmentSourceRepositoryInterface
{
    /**
     * Get Appointment Source list
     *
     * @param array $filters
     */
    public function list(array $filters = []);
    /**
     * Delete Appointment Source
     *
     * @param number $id
     */
    public function remove($id);
    /**
     * Add Appointment Source
     * @param array $data
     * @return number
     */
    public function add(array $data);
    /**
     * Update Appointment Source
     * @param array $data
     * @return number
     */
    public function edit(array $data, $id);
}