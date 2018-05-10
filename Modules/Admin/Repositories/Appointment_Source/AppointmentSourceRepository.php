<?php
/**
 * Created by PhpStorm.
 * User: Huy
 * Date: 4/22/2018
 * Time: 6:15 PM
 */

namespace Modules\Admin\Repositories\Appointment_Source;


use Modules\Admin\Models\AppointmentSourceTable;

class AppointmentSourceRepository implements ApointmentSourceRepositoryInterface
{
    protected $appointmentSource;

    public function __construct(AppointmentSourceTable $appointmentSourceTable)
    {
        $this->appointmentSource = $appointmentSourceTable;
    }

    /**
     * Get Appointment Source list
     *
     * @param array $filters
     */
    public function list(array $filters = [])
    {
        // TODO: Implement list() method.
    }

    /**
     * Delete Appointment Source
     *
     * @param number $id
     */
    public function remove($id)
    {
        // TODO: Implement remove() method.
    }

    /**
     * Add Appointment Source
     * @param array $data
     * @return number
     */
    public function add(array $data)
    {
        // TODO: Implement add() method.
    }

    /**
     * Update Appointment Source
     * @param array $data
     * @return number
     */
    public function edit(array $data, $id)
    {
        // TODO: Implement edit() method.
    }
}