<?php
/**
 * Created by PhpStorm.
 * User: Như
 * Date: 15/03/2018
 * Time: 1:21 CH
 */

namespace Modules\Admin\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Repositories\CustomerSource\CustomerSourceRepositoryInterface;

class CustomerSourceController extends Controller
{
    /**
     * @var Product Unit Repository Interface
     */
    protected $customerSource;
    public function __construct(CustomerSourceRepositoryInterface $productUnit){
        $this->customerSource = $productUnit;
    }
    /**
     * Trang chính
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function indexAction()
    {
        $customerSourceList = $this->customerSource->list();
        return view('admin::customer-source.index', [
            'LIST'   => $customerSourceList,
            'FILTER' => $this->filters()
        ]);
    }
    // function  filter
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
     * Ajax danh sách customer source
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function listAction(Request $request){
        $filters            = $request->only(['page', 'display', 'search_type', 'search_keyword', 'is_active']);
        $customerSourceList   = $this->customerSource->list($filters);
        return view('admin::customer-source.list', ['LIST' => $customerSourceList]);
    }
    // FUNCTION RETURN VIEW ADD
    public function addAction(){
        return view('admin::customer-source.add', [

            'TITLE'     =>'Thêm ngườn khách hàng',

        ]);
    }
    // FUNCTION SUBMIT SUBMIT ADD
    public function submitAddAction(Request $request){

        $data = $this->validate($request,
            [// validate value input
                'customer_source_code'            =>'required|unique:customer_source',
                'customer_source_name'            => 'required',
            ], [ // custom info messages
                'customer_source_name.required'   => 'Tên nguồn khách hàng  bắt buộc',
                'customer_source_code.required' => 'Mã nguồn khách hàng  bắt buộc',
                'customer_source_code.unique'   => 'Mã nguồn khách hàng đã tồn tại'
            ]);
        $data['customer_source_description']    = $request->customer_source_description;
        $data['is_active']                      = $request->is_active;
        $data['created_at']                     = date('Y-m-d H:i:s');

        $oCustomerSource                        = $this->customerSource->add($data);
        if($oCustomerSource){
            // display  info  status update
            $request->session()->flash('status', 'Tạo đơn vị sản phẩm thành công!');
        }
        // redirect to view index
        return redirect()->route('customer-source');

    }
    // FUNCTION RETURN VIEW EDIT
    public function editAction($id){
        $item = $this->customerSource->getItem($id);
        return view('admin::customer-source.edit', [
            'TITLE'     =>'Cập nhật nguồn sản phẩm',
            'item'     =>$item
        ]);
    }
    // function submit update customer source
    public function submitEditAction(Request $request, $id){
        $data = $this->validate($request, [
            //validate value input
            'customer_source_name'            => 'required',
            'customer_source_code'            => 'required|unique:customer_source,customer_source_code,'.$id.',customer_source_id',
        ],[// custom info messages
            'customer_source_name.required'   => 'Tên nguồn khách hàng bắt buộc',
            'customer_source_code.unique'     => 'Mã nguồn đã tồn tại'
        ]);
        $data['customer_source_description']   = $request->customer_source_description;
        $data['is_active']                      = $request->is_active;
        $oCustomerSource                       = $this->customerSource->edit($data ,$id);
        if($oCustomerSource){
            // display  info  status update
            $request->session()->flash('status', 'Cập nhât dữ liệu thành công!');
        }else{
            // display  info  status update
            Session::flash('messages', "Giá trị vừa nhập đã tồn tại");
            return redirect()->back();
        }
        // redirect to view index
        return redirect()->route('customer-source');
    }
    // function change status
    public function changeStatusAction(Request $request){
        $params             = $request->all() ;
        $data['is_active']  = ($params['action'] == 'unPublish') ? 1 : 0;
        $this->customerSource->edit($data, $params['id']);
        return response()->json([
            'status'=>0,
            'messages'=>'Trạng thái đã được cập nhật '
        ]);
    }
    // FUNCTION DELETE ITEM
    public function removeAction($id)
    {
        $this->customerSource->remove($id);
        return response()->json([
            'error'   => 0,
            'message' => 'Remove success'
        ]);
    }
}