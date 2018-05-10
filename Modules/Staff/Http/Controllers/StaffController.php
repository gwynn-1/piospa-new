<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 29/03/2018
 * Time: 1:22 SA
 */

namespace Modules\Staff\Http\Controllers;


class StaffController extends Controller
{


    public function indexAction()
    {
        return view('staff::index.index');
    }
}