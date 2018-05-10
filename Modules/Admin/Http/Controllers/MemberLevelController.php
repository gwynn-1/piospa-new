<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 17/03/2018
 * Time: 2:33 PM
 */
namespace Modules\Admin\Http\Controllers;
use Illuminate\Http\Request;
use Modules\Admin\Repositories\MemberLevel\MemberLevelRepositoryInterface;
class MemberLevelController extends Controller
{
    protected $memberLevel;


    public function __construct(MemberLevelRepositoryInterface $memberLevel)
    {
        $this->memberLevel = $memberLevel;
    }
    /**
     * Trang chính
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function indexAction(Request $request)
    {
        $memberLevelList = $this->memberLevel->list();

        return view('admin::member-level.index', [
            'LIST'   => $memberLevelList,
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
            'is_active' => [
                'text' => 'Trạng thái:',
                'data' => [
                    '' => 'Tất cả',
                    1  => 'Đang hoạt động',
                    0  => 'Tạm ngưng'
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
        $filters  = $request->only(['page', 'display', 'search_type', 'search_keyword', 'is_active']);
        $memberLevelList = $this->memberLevel->list($filters);
        return view('admin::member-level.list', ['LIST' => $memberLevelList]);
    }


    /**
     * Xóa user
     *
     * @param number $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeAction($id)
    {
        $this->memberLevel->remove($id);

        return response()->json([
            'error'   => 0,
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

        return view('admin::member-level.add');
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
            'member_level_name' => 'required|unique:member_level',
            'member_level_milestone' => 'required|numeric',
        ],[
            'member_level_name.required'        => 'Cấp độ bắt buộc ',
            'member_level_name.unique'          => 'Cấp độ đã tồn tại',
            'member_level_milestone.required'   => 'Số điểm qui đổi bắt buộc ',
            'member_level_milestone.numeric'    => 'Số điểm qui đổi là Number ',
        ]);
        $data['created_at']                 = date('Y-m-d H:i:s') ;
        $data['is_active']                  = $request->is_active;
        $oMemberLevel =$this->memberLevel->add($data);
        if($oMemberLevel){
            // display  info  status update
            $request->session()->flash('status', 'Tạo cấp độ thành viên thành công!');
        }
        return redirect()->route('member-level');
    }



    public function editAction($id)
    {

        $item = $this->memberLevel->getItem($id);
        return view('admin::member-level.edit',compact('item'));
    }

    public function  submitEditAction(Request $request,$id)
    {

        $data = $this->validate($request, [
            'member_level_name' => 'required|unique:member_level,member_level_name,'.$id.',member_level_id',
            'member_level_milestone' => 'required|numeric',
        ],[
            'member_level_name.required'        => 'Cấp độ bắt buộc ',
            'member_level_name.unique'          => 'Cấp độ đã tồn tại',
            'member_level_milestone.required'   => 'Số điểm qui đổi bắt buộc ',
            'member_level_milestone.numeric'    => 'Số điểm qui đổi là Number ',
        ]);

        $data['is_active'] = (int) $request->is_active;

        $oMemberLevel = $this->memberLevel->edit($data, $id);

        if($oMemberLevel){
            // display  info  status update
            $request->session()->flash('status', 'Cập nhât dữ liệu thành công!');
        }


        return redirect()->route('member-level')->with('success','Item updated successfully');



    }


    public  function changeStatusAction(Request $request)
    {
        $params             = $request->all() ;
        $data['is_active']  = ($params['action'] == 'unPublish') ? 1 : 0;
        $this->memberLevel->edit($data, $params['id']);
        return response()->json([
            'status'=>0,
            'messages'=>'Trạng thái đã được cập nhật '
        ]);
    }

}