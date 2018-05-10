<?php
/**
 * Created by PhpStorm.
 * User: thach le viet
 * Date: 13/03/2018
 * Time: 1:21 CH
 */
namespace Modules\Admin\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Repositories\CustomerGroup\CustomerGroupRepositoryInterface;

//use Modules\Admin\Repositories\ServiceGroup\ServicePackageRepositoryInterface;
class CustomerGroupController extends Controller
{
    /**
     * @var Service Package Repository Interface
     */
    protected $customGroup;
    public function __construct(CustomerGroupRepositoryInterface $customGroup){
        $this->customGroup = $customGroup;
    }
    /**
     * Trang chính
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function indexAction()
    {
        $customGroupList = $this->customGroup->list();
        return view('admin::customer-group.index', [
            'LIST'   => $customGroupList,
            'FILTER' => $this->filters(),
            'title'=> 'Danh sách nhóm khách hàng'
        ]);
    }
    // FUNCTION  FILTER LIST ITEM
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
     * Ajax danh sách customer-group
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function listAction(Request $request){
        $filters            = $request->only(['page', 'display', 'search_type', 'search_keyword', 'is_active']);
        $customGroupList   = $this->customGroup->list($filters);
        return view('admin::customer-group.list', ['LIST' => $customGroupList,]
        );
    }
    // FUNCTION RETURN VIEW ADD
    public function addAction(){
        return view('admin::customer-group.add', [
            'TITLE'     =>'Thêm nhóm khách hàng ',
        ]);
    }
    // FUNCTION SUBMIT SUBMIT ADD
    public function submitAddAction(Request $request){
        $data = $this->validate($request,
            [// validate value input
                'customer_group_name'           => 'required',
                'customer_group_image'          => 'required|mimes:jpeg,jpg,png',
                'customer_group_code'           => 'required|unique:customer_group',
            ], [// custom info errors messages
                'customer_group_name.required'  => 'Tên nhóm khách hàng  bắt buộc',
                'customer_group_image.required' => 'Hình ảnh  bắt buộc',
                'customer_group_image.mimes'    => 'Hình ảnh phải đúng định dạng jpeg,jpg,png',
                'customer_group_code.required'  => 'Mã nhóm bắt buộc',
                'customer_group_code.unique'    => 'Mã nhóm đã tồn tại',
            ]);
        $data['customer_group_description'] = $request->customer_group_description;
        $data['customer_group_image']       = $this->uploadFiles($request, 'customer_group_image', 'customer_group_image', 'uploads/admin/customer-group');
        $data['created_at']                 = date('Y-m-d H:i:s') ;
        $data['is_active']                  = $request->is_active;
        $oCustomGroup                       = $this->customGroup->add($data);
        if($oCustomGroup){
            $request->session()->flash('status', 'Tạo nhóm khách hàng thành công!');
        }
        return redirect()->route('customer-group');
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
    // FUNCTION RETURN VIEW EDIT
    public function editAction($id){
        // get object according to id
        $OBJECT = $this->customGroup->getItem($id);
        return view('admin::customer-group.edit', [
            'TITLE'     =>'Cập nhật nhóm khách hàng',
            'OBJECT'    =>$OBJECT
        ]);
    }
    // FUNCTION SUBMIT EDIT
    public function submitEditAction(Request $request, $id){
        $data = $this->validate($request,
            [// validate value input
                'customer_group_name'           => 'required',
                'customer_group_code'           => 'required|unique:customer_group,customer_group_code,'.$id.',customer_group_id',
            ],[// custom info errors messages
                'customer_group_name.required'  => 'Tên nhóm khách hàng  bắt buộc',
                'customer_group_code.required'  => 'Mã nhóm bắt buộc',
                'customer_group_code.unique'    => 'Mã nhóm đã tồn tại',
            ]
        );
        // check has update image
        if($request->hasFile('customer_group_image')) {
            $this->validate($request,
                [// validate value input
                    'customer_group_image' => 'mimes:jpeg,jpg,png',
                ], [// custom info errors messages
                    'customer_group_image.mimes' => 'Hình ảnh phải đúng định dạng jpeg,jpg,png',
                ]
            );
            $data['customer_group_image']   = $this->uploadFiles($request, 'customer_group_image', 'customer_group_image', 'uploads/admin/customer-group');
        }
        $data['is_active']                  = $request->is_active;
        $data['customer_group_description'] = $request->customer_group_description;
        $oCustomGroup                       = $this->customGroup->edit($data ,$id);
        if($oCustomGroup){
            $request->session()->flash('status', 'Cập nhât dữ liệu thành công!');
        }else{
            Session::flash('messages', "Giá trị vừa nhập đã tồn tại");
            return redirect()->back();
        }
        return redirect()->route('customer-group');
    }
    // FUNCTION CHANGE STATUS
    public function changeStatusAction(Request $request){
        $params             = $request->all();
        $data['is_active']  = ($params['action'] == 'unPublish') ? 1 : 0;
        $this->customGroup->edit($data, $params['id']);
        return response()->json([
            'status'=>0,
            'messages'=>'Trạng thái đã được cập nhật '
        ]);
    }
    // FUNCTION DELETE ITEM
    public function removeAction($id)
    {
        $this->customGroup->remove($id);
        return response()->json([
            'error'   => 0,
            'message' => 'Remove success'
        ]);
    }
}