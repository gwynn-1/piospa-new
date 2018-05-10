<?php
namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Validator;
use \Auth;

/**
 * Login page
 * 
 * @author isc-daidp
 * @since Feb 23, 2018
 */
class LoginController extends Controller
{
    /**
     * Login process
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|unknown
     */
    public function indexAction(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $validator = Validator::make($request->all(), [
                'email'    => 'required|email',
                'password' => 'required|min:6'
            ]);
            
            if ($validator->fails())
            {
                return response()->json([
                    'error' => 1,
                    'message' => $validator->errors()->all()
                ]);    
            }
            
            $certifications = $request->only(['email', 'password']);
            if (Auth::attempt($certifications))
            {
                // Authentication passed...
                return response()->json([
                    'error' => 0,
                    'message' => 'Đăng nhập thành công.',
                    'url' => route(LOGIN_HOME_PAGE)
                ]); 
            }
            
            return response()->json([
                'error' => 1,
                'message' => 'Email hoặc password không đúng.'
            ]);
        }
        
        return view('user::login.index');
    }
    
    
    public function logoutAction()
    {
        Auth::logout();
        
        return redirect()->route('login');
    }
}