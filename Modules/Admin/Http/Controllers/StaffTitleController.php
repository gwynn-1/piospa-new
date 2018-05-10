<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Ngoc Son
 * Date: 3/17/2018
 * Time: 1:19 PM
 */

namespace Modules\Admin\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Repositories\StaffTitle\StaffTitleRepositoryInterface;

class StaffTitleController extends Controller
{
    protected $stafftitle;

    public function __construct(StaffTitleRepositoryInterface $stafftitle)
    {
        $this->stafftitle=$stafftitle;
    }

//    return view index
    public function indexAction(){
        $titleList=$this->stafftitle->list();
        return view('admin::staff-title.index',[
            'LIST'=> $titleList,
            'FILTER'=> $this->filters()
        ]);
    }

    //Function filters
    protected function filters()
    {
        return [
            'is_active'=>  [
                'text' => 'Trạng thái',
                'data' =>[
                    ''=> 'Tất cả',
                    1 => 'Đang hoạt động',
                    0 =>'Tạm ngưng'
                ]
            ]
        ];
    }
    /**
     * Ajax danh sách staff title
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function listAction(Request $request){
        $filters=$request->only(['page','display','search_type','search_keyword','is_active']);
        $staffTitleList= $this->stafftitle->list($filters);
        return view('admin::staff-title.list',['LIST' => $staffTitleList]);

    }

    //Function add
    public function addAction()
    {
        return view('admin::staff-title.add');
    }

    //Function submit form add
    public function submitAddAction(Request $request)
    {
        $data=$this->validate($request,[
            'staff_title_name'=>'required|unique:staff_title,staff_title_name',

            'is_active'=>'integer',

        ],[
            'staff_title_name.required'=>'Tên chức danh không được trống',
            'staff_title_name.unique'=>'Tên chức danh đã tồn tại',

        ]);
        $this->stafftitle->add($data);
        return redirect()->route('admin.staff-title');
    }

    //Function remove
    public function removeAction($id){

        $this->stafftitle->remove($id);
        return response()->json([
            'status'=>0,
            'message'=>'Remove success'
        ]);
    }

    //Function edit
    public function editAction($id)
    {
        $item=$this->stafftitle->getEdit($id);
        return view('admin::staff-title.edit',compact('item'));
    }

    //Function submit form edit
    public function submitEditAction(Request $request,$id)
    {
        $data=$this->validate($request,[
           'staff_title_name'=>'required|unique:staff_title,staff_title_name,'.$id.",staff_title_id",
           'is_active'=>'integer'
        ],[
            'staff_title_name.required'=>'Tên chức danh không được để trống',
            'staff_title_name.unique'=>'Tên chức danh đã tồn tại'
        ]);
        $staffTitle=$this->stafftitle->edit($data,$id);
        if($staffTitle){
            $request->session()->flash('status','Cập nhật thành công');
        }else{
            Session::flash('messages','Cập nhật thất bại');
            return redirect()->back();
        }
        return redirect()->route('admin.staff-title');
    }

    //Function thay đổi status
    public  function changeStatusAction(Request $request)
    {
        $params             = $request->all() ;

        $data['is_active']  = ($params['action'] == 'unPublish') ? 1 : 0;
        $this->stafftitle->edit($data, $params['id']);
        return response()->json([
            'status'=>0,

        ]);
    }


}