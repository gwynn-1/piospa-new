<?php
/**
 * Created by PhpStorm.
 * User: nhu
 * Date: 26/03/2018
 * Time: 21:30
 */

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;


class CustomerTable extends Model
{

    use ListTableTrait;

    /*
     * table service_package
     */
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';

    /*
     * fill table
     * $var array
     */
    protected $fillable = ['customer_id', 'fullname', 'code', 'gender', 'birthday', 'phone', 'cmnd', 'customer_source_id', 'province_id', 'district_id', 'ward_id', 'email', 'zalo', 'facebook', 'address', 'customer_avatar', 'cusomer_refer_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_delete', 'is_active'];

    /*
     * Build query tablem
     * @author doan thi huynh nhu
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function _getList()
    {
        $oSelect = $this->from($this->table . ' as customers')
            ->leftJoin('ward', 'ward.wardid', '=', 'customers.ward_id')
            ->leftJoin('district', 'district.districtid', '=', 'customers.district_id')
            ->leftJoin('province', 'province.provinceid', '=', 'customers.province_id')
            ->select('customer_id', 'fullname',
                'code', 'gender', 'birthday',
                'phone', 'cmnd', 'customer_source_id',
                'province_id', 'district_id', 'ward_id', 'email',
                'zalo', 'facebook', 'address', 'customer_avatar',
                'cusomer_refer_id', 'created_at', 'updated_at',
                'created_by', 'updated_by', 'is_delete', 'is_active',
                'ward.name as ward_name', 'district.name as district_name',
                'province.name as province_name')
            ->where('is_delete', 0);
        return $oSelect;
    }

    // function remove item
    public function remove($id)
    {
        return $this->where($this->primaryKey, $id)->update(['is_delete' => 1]);
    }

    /*
     * function edit
     */
    public function edit(array $data, $id)
    {

        return $this->where($this->primaryKey, $id)->update($data);

    }
    /*
     * function save
     */

    /*
     * function add
     */
    public function add(array $data)
    {
//        dd($data);
        $oCustom = $this->create($data);
        return $oCustom->customer_id;
//        $add=$this->create($data);
//        return $add->id;
    }

    /*
     * function getItem
     */
    public function getItem($id)
    {
        return $this->where($this->primaryKey, $id)->first();
    }

}