<?php
/**
 * Created by PhpStorm.
 * User: Thach
 * Date: 26/03/2018
 * Time: 2:12 CH
 */

namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Repositories\StaffDepartment\StaffDepartmentRepositoryInterface;
use Modules\Admin\Repositories\Staffs\StaffRepositoryInterface;
use Modules\Admin\Repositories\StaffTitle\StaffTitleRepositoryInterface;
use Modules\Admin\Repositories\Store\StoreRepositoryInterface;
use Modules\Admin\Requests\StaffRequestForm;

class StaffController extends Controller
{


    protected $staff;
    protected $staffTitle;
    protected $staffDepartment;
    protected $store ;
    public function __construct(StaffRepositoryInterface $staffRepository,StaffTitleRepositoryInterface $staffTitleRepository,StaffDepartmentRepositoryInterface $staffDepartmentRepository, StoreRepositoryInterface $storeRepository)
    {
        $this->staff            = $staffRepository;
        $this->staffTitle       = $staffTitleRepository;
        $this->staffDepartment  = $staffDepartmentRepository ;
        $this->store            = $storeRepository;
    }

    /**
     * page index display list staff
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function indexAction()
    {
        $staffList = $this->staff->list();
        return view('admin::staff.index', [
            'LIST'   => $staffList,
            'FILTER' => $this->filters(),
            'title'=> 'Danh sách nhân viên'
        ]);
    }

    /*
     *  function filter list staff
     */
    protected function filters()
    {
        return [
            'is_active' => [
                'text' => 'Trạng thái:',
                'data' => [
                    '' => 'Tất cả',
                    1  => 'Active',
                    0  => 'Deactive'
                ]
            ]
        ];
    }

    /**
     * ajax load list staff
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function listAction(Request $request){
        $filters     = $request->only(['page', 'display', 'search_type', 'search_keyword', 'is_active']);
        $staffList   = $this->staff->list($filters);
        return view('admin::staff.list', ['LIST' => $staffList]
        );
    }
    /*
     * function load form add staff
     * date write 27/03/2018
     */
    public function addAction(){
        return view('admin::staff.add', [
            'TITLE'                   => 'Thêm nhân viên',
            'staffTitleOption'        => $this->staffTitle->getStaffTitleOption(),
            'staffDepartmentOption'   => $this->staffDepartment->getstaffDepartmentOption(),
            'storeOption'             => $this->store->getStoreOption()
        ]);
    }
    /*
     * function submit add staff
     * date write 27/03/2018
     */
    public function submitAddAction(StaffRequestForm $request){

        $params   = $request->all() ;
        echo '<pre>';
        print_r($params);
        echo '</pre>';
        die();
//        unset($params['_token']) ;unset($params['avatar']) ;
//
//        $params['staff_avatar'] = $this->uploadFiles($request,'avatar', 'staff');
//
//        if(!$this->staff->add($params)){
//
//            return redirect()->back();
//        }
        $request->session()->flash('status', 'Tạo tên nhân viên thành công !');

        return redirect()->route('staff');
    }
    /*
    * function upload files
    * $request Request
    * $fileName => name input file
    * $prefix => set file name of image
    * $uploads path image update
    */
    public function uploadFiles($request , $fileName ,$prefix = null, $uploads = 'uploads/images'){
        // check has image

        if($request->hasFile($fileName)){
            // read file name
            $image  = $request->file($fileName);

            //get file name and custom file name
            $names 	= $uploads.'/'.time().'_'.date('d_m_Y').'_'.$prefix.'.'.$image->getClientOriginalExtension();
            // move file to public_path
            $image->move(public_path($uploads), $names);
        }
        // return file name
        return $names ;
    }

    public function editAction($id){
        $object = $this->staff->getItemHasAccount($id);

        return view('admin::staff.edit', [
            'TITLE'                   =>'Cập nhật nhân viên',
            'staffTitleOption'        => $this->staffTitle->getStaffTitleOption(),
            'staffDepartmentOption'   => $this->staffDepartment->getstaffDepartmentOption(),
            'storeOption'             => $this->store->getStoreOption(),
            'OBJECT'                  => $object
        ]);
    }
    /*
     * function submit add staff
     * date write 27/03/2018
     */
    public function submitEditAction(StaffRequestForm $request){

        $params   = $request->all() ;

        if($request->hasFile('avatar')){
            echo  'Ok';
            die();
        }
        unset($params['_token']); unset($params['avatar']);

        $params['staff_avatar'] = $this->uploadFiles($request,'avatar', 'staff');

        if(!$this->staff->edit($params)){

            Session::flash('messages', "Giá trị vừa nhập đã tồn tại");

            return redirect()->back();
        }
        $request->session()->flash('status', 'Tạo tên nhân viên thành công !');

        return redirect()->route('staff');
    }
}