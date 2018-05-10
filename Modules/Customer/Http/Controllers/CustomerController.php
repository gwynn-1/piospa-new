<?php

namespace Modules\Customer\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: nhu
 * Date: 26/03/2018
 * Time: 22:20
 */

namespace Modules\Customer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Modules\Customer\Repositories\Customer\CustomerRepositoryInterface;
use Modules\Admin\Repositories\Province\ProvinceRepositoryInterface;
use Modules\Admin\Repositories\District\DistrictRepositoryInterface;
use Modules\Admin\Repositories\Ward\WardRepositoryInterface;
use Modules\Admin\Repositories\CustomerSource\CustomerSourceRepositoryInterface;


class CustomerController extends Controller
{

    /* @var CustomerRepositoryInterface
     */
    protected $customer;
    protected $province;
    protected $district;
    protected $ward;
    protected $customerSource;
    const TEMP_PATH = "uploads/temp_upload";
    const UPLOADS_PATH = "uploads/services/services";


    public function __construct(CustomerRepositoryInterface $customer, ProvinceRepositoryInterface $province
        , CustomerSourceRepositoryInterface $customerSource
        , DistrictRepositoryInterface $district, WardRepositoryInterface $ward)
    {
        $this->customer = $customer;
        $this->province = $province;
        $this->district = $district;
        $this->ward = $ward;
        $this->customerSource = $customerSource;
    }

    /**
     * Trang chính
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function indexAction(Request $request)
    {
        $customerList = $this->customer->list();
        return view('customer::customer.index', [
            'LIST'   => $customerList,
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
                    1 => 'Đang hoạt động',
                    0 => 'Tạm ngưng'
                ]
            ]
        ];
    }

// FUNCTION CHANGE STATUS
    public function changeStatusAction(Request $request)
    {
        $params = $request->all();
        $data['is_active'] = ($params['action'] == 'unPublish') ? 1 : 0;
        $this->customer->edit($data, $params['id']);
        return response()->json([
            'status' => 0,
            'messages' => 'Trạng thái đã được cập nhật '
        ]);
    }

    /**
     * Ajax danh sách user
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function listAction(Request $request)
    {
        $filters = $request->only(['page', 'display', 'search_type', 'search_keyword', 'is_active']);
        $customerList = $this->customer->list($filters);
        return view('customer::customer.list', ['LIST' => $customerList]);
    }

    /**
     * upload hình ảnh
     */
    public function uploadsAction(Request $request)
    {
        $this->validate($request, [
            "customer_image" => "mimes:jpeg,jpg,png,gif|max:1000"
        ],
            [
                "mimes" => ":attribute này không phải là hình",
                "max" => "kích thước hình quá lớn"
            ]);
        $this->uploadFileToTemp($request->file('customer_image'));
        return response()->json(["success" => "1"]);

    }

    private function uploadFileToTemp($file)
    {
        $file_name = time() . "_customer." . $file->getClientOriginalExtension();
        $des_file = self::TEMP_PATH . $file_name;
        Session::push("addAction_image", $file_name);
        move_uploaded_file($file->getPathname(), $des_file);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * Xóa file
     */
    public function deleteTempFileAction()
    {
        Storage::disk("public")->delete(seft::TEMP_PATH . Session::get("addAction_image")[0]);
        Session::forget("addAction_image");
        return response()->json(["success" => "1"]);
    }

    private function transferTempfileToAdminfile()
    {
        if (Session::has("addAction_image")) {
            Storage::disk("public")->makeDirectory(self::UPLOAD_PATH . "/" . date('Ymd'));
            $old_path = self::TEMP_PATH . Session::get("addAction_image")[0];
            $new_path = self::UPLOAD_PATH . date('Ymd') . "/" . Session::get("addAction_image")[0];
            Storage::disk("public")->move($old_path, $new_path);
            Session::forget("addAction_image");
            return $new_path;
        } else {
            return null;
        }
    }

    /**
     * Xóa user
     *
     * @param number $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeAction($id)
    {
        $this->customer->remove($id);
    }

    /**
     * Form thêm user
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function addAction()
    {
        $optionProvince = $this->province->getOptionProvince();
        $optionCustomerSource = $this->customerSource->getOptionCustomerSource();
        return view('customer::customer.add', array(
            'optionProvince' => $optionProvince),
            compact('optionCustomerSource'));
    }

    /**
     * Xử lý thêm
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitaddAction(Request $request)
    {
        // dd($request);
        $data = $this->validate($request, [
            'fullname' => 'required',
            'birthday' => 'required',
            'phone' => 'required|unique:customers',
            'cmnd' => 'required|unique:customers',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',

        ],
            [
                'fullname.required' => 'Vui lòng nhập :attribute',
                'birthday.required' => 'Vui lòng nhập :attribute',
                'phone.required' => 'Vui lòng nhập :attribute',
                'phone.unique' => ':attribute đã tồn tại',
                'cmnd.required' => 'Vui lòng nhập :attribute',
                'cmnd.unique' => ':attribute đã tồn tại',

            ]);
        $data['is_active'] = $request->is_active;
        //$data['birthday'] = date('Y-m-d : H:i:s', $request->birthday);
        $data['customer_image'] = $this->transferTempfileToAdminfile();
        $this->customer->add($data);

        return redirect()->route('customer');
    }

    public function editAction($id)
    {
        $item = $this->customer->getItem($id);
        //Show province , district , ward khi edit
        $oOptionProvince = $this->province->getOptionProvince();
        $oOptionDistrict = $this->district->getOptionDistrict($item->province_id);
        $oOptionWard = $this->ward->getOptionWard($item->district_id);
        $optionCustomerSource = $this->customerSource->getOptionCustomerSource();
        return view('customer::customer.edit', compact('item'),
            array(
                'optionCustomerSource' => $optionCustomerSource,
                'optionProvince' => $oOptionProvince,
                'optionDistrict' => $oOptionDistrict,
                'optionWard' => $oOptionWard
            ));
    }

    public function submitEditAction(Request $request, $id)
    {
        $item = $this->customer->getItem($id);
        if ($request->isMethod('post')) {
            $data = $this->validate($request, [
                'fullname' => 'required',

//               'province' => 'required',
//            'district' => 'required',
//                'ward' => 'required'
            ], [
                'fullname' => 'Vui lòng nhập tên khách hàng'
            ]);
            $data['province_id'] = $request->province;
            $data['district_id'] = $request->district;
            $data['ward_id'] = $request->ward;
            $data['is_active'] = (int)$request->is_active;

            $this->customer->edit($data, $id);

            // Item::find($id)->edit($request->all());
            return redirect()->route('customer')->with('success', 'Cập nhật thành công');
        }

    }
}