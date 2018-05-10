<?php
namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Modules\User\Repositories\User\UserRepositoryInterface;

/**
 * User manager
 * 
 * @author isc-daidp
 * @since Feb 23, 2018
 */
class IndexController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    protected $user;
    
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }
    
    
    /**
     * Trang chính
     * 
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function indexAction(Request $request)
    {
        $userList = $this->user->list();
        return view('user::index.index', [
            'LIST'   => $userList,
            'FILTER' => $this->filters()
        ]);
    }
    
    //show history lai dc ko e
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
                    1  => 'Active',
                    0  => 'Deactive'
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
        $userList = $this->user->list($filters);
        
        #$b = new \Illuminate\Pagination\LengthAwarePaginator();
        #$b->nextPageUrl()
        #$b->toArray();
        
        return view('user::index.list', ['LIST' => $userList]);
    }
    
    
    /**
     * Xóa user
     * 
     * @param number $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeAction($id)
    {
        $this->user->remove($id);
        
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
        return view('user::index.add');
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
            'name'        => 'required',
            'email'       => 'required|email',
            'password'    => 'required|string|min:6|confirmed',
            //'is_active'   => 'int',
        ]);
        
        $this->user->add($data);
        
        return redirect()->route('user');
    }
}