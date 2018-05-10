<?php


namespace Modules\StaffAccount\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\StaffAccount\Models\StaffAccountTable;
use Modules\StaffAccount\Repositories\StaffAccount\StaffAccountRepositoryInterface;
use Modules\Admin\Repositories\Store\StoreRepositoryInterface;
use Modules\Admin\Repositories\Staffs\StaffRepositoryInterface;


class StaffAccountController extends Controller
{
    protected $staffAccount;
    protected $store;
    protected $staff;


    public function __construct(StaffAccountRepositoryInterface $staffAccount, StoreRepositoryInterface $store,StaffRepositoryInterface $staff)
//        $nhan->add($data)
    {
        $this->staffAccount = $staffAccount;
        $this->store = $store;
        $this->staff= $staff;
    }


    /**
     * Trang chính
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function indexAction(Request $request)
    {
        $staffAccountList = $this->staffAccount->list();

        return view('staffaccount::staff-account.index', [
            'LIST' => $staffAccountList,
            'FILTER' => $this->filters()
        ]);
    }


    /**
     * Khai báo filter
     *
     * @return array
     */
    protected function filters()
    {
        return [
            'sa$is_active' => [
                'text' => 'Trạng thái:',
                'data' => [
                    '' => 'Tất cả',
                    1 => 'Đang hoạt động',
                    0 => 'Tạm ngưng'
                ]
            ]
        ];
    }

    /**
     * Ajax danh sách user
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function listAction(Request $request)
    {
        $filters = $request->only(['page', 'display', 'search_type', 'search_keyword', 'sa$is_active']);
        $staffAccountList = $this->staffAccount->list($filters);



        return view('staffaccount::staff-account.list', ['LIST' => $staffAccountList]);
    }


    /**
     * Xóa user
     *
     * @param number $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeAction($id)
    {
        $this->staffAccount->remove($id);

        return response()->json([
            'error' => 0,
            'message' => 'Remove success'
        ]);
    }

    /**
     * Form thêm user
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function addAction()
    {
        $optionStaffAccount = $this->store->getStoreOption();
        $optionStaff = $this->staff->convertNameToSelect2();
        $optionCode = $this->staff->convertCodeToSelect2();

        return view('staffaccount::staff-account.add', array(
            'optionStaffAccount' => $optionStaffAccount,'optionStaff'=>$optionStaff,'optionCode'=>$optionCode
        ));

    }

    /**
     * Xử lý thêm user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitaddAction(Request $request)
    {
        $data = $this->validate($request, [
            'staff_id' => 'required',
            'store_id' => 'required',
            'username' => 'required|unique:staff_account',
            'password' => 'required|min:6|confirmed', //dung confirmed se auto bat password_confirmation

            'is_active' => 'required',
        ]);

//        $hi = $request->staff_id;

//        if (strlen($hi) > 5 )
//        {
//           $nhan = $this->staffAccount->getNameDependOnStaffId($hi);
//
//           $data['staff_id'] = $nhan ;
//        }





        $staffAccount =$this->staffAccount->add($data);

        if($staffAccount){
            // display  info  status update
//            dd("status");
            $request->session()->flash('status', 'Tạo tài khoản thành viên thành công!');
        }
        return redirect()->route('staff-account');
    }


    public function editAction($id)
    {
        $optionStaffAccount = $this->store->getStoreOption();
        $item = $this->staffAccount->getItem($id);
        return view('staffaccount::staff-account.edit', array(
            'optionStaffAccount' => $optionStaffAccount), compact('item'));
    }

    public function submitEditAction(Request $request, $id)
    {

        $data = $this->validate($request, [
            'staff_id' => 'required',
            'store_id' => 'required',
            'username' => 'required',



        ]);


//
        $data['is_active'] = (int)$request->is_active;



        $staffAccount =$this->staffAccount->edit($data, $id);
        if($staffAccount){
            // display  info  status update
            $request->session()->flash('status', 'Cập nhât dữ liệu thành công!');
        }

        return redirect()->route('staff-account')->with('success', 'Item updated successfully');


    }


    public function changeStatusAction(Request $request)
    {
        $params = $request->all();
        $data['is_active'] = ($params['action'] == 'unPublish') ? 1 : 0;
        $this->staffAccount->edit($data, $params['id']);
        return response()->json([
            'status' => 0,
            'messages' => 'Trạng thái đã được cập nhật '
        ]);
    }


}