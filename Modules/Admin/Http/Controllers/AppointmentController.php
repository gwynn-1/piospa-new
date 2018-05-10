<?php
/**
 * Created by PhpStorm.
 * User: Huy
 * Date: 4/20/2018
 * Time: 11:35 AM
 */

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Repositories\Appoinment\AppointmentRepositoryInterface;

class AppointmentController extends Controller
{
    public $appointment;

    public function __construct(AppointmentRepositoryInterface $appointmentRepository)
    {
        $this->appointment = $appointmentRepository;
    }

    public function indexAction(Request $request){
        $oList = $this->appointment->list();
//        dd($oList);
        return view("admin::appointment.index",[
            "LIST"=>$oList
        ]);
    }

    public function editAction(Request $request){
        $edit = $this->appointment->edit($request->except("appointment"),$request->input("appointment_id"));
        return response()->json(["status"=>$edit,]);
    }

}