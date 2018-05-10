<?php
/**
 * Created by PhpStorm.
 * User: Huy
 * Date: 4/20/2018
 * Time: 11:31 AM
 */

namespace Modules\Admin\Repositories\Appoinment;


use Modules\Admin\Models\AppointmentTable;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    protected $apointment;

    public function __construct(AppointmentTable $appointmentTable)
    {
        $this->apointment = $appointmentTable;
    }

    /**
     * Get Appointment list
     *
     * @param array $filters
     */
    public function list(array $filters = [])
    {
        // TODO: Implement list() method.
        return $this->apointment->getAppointmentList();
    }

    /**
     * Delete Appointment
     *
     * @param number $id
     */
    public function remove($id)
    {
        // TODO: Implement remove() method.
    }

    /**
     * Add Appointment
     * @param array $data
     * @return number
     */
    public function add(array $data)
    {
        // TODO: Implement add() method.
    }

    /**
     * Update Appointment
     * @param array $data
     * @return number
     */
    public function edit(array $data, $id)
    {
        // TODO: Implement edit() method.
        try{
            $this->apointment->edit($id,$data);
            return 1;
        }catch (\Exception $e){
            return 0;
        }
    }

    /**
     * Update OR ADD Appointment
     * @param array $data
     * @return number
     */
    public function save(array $data, $id)
    {
        // TODO: Implement save() method.
    }

    /**
     * get item
     * @param array $data
     * @return $data
     */
    public function getItem($id)
    {
        // TODO: Implement getItem() method.
    }
}