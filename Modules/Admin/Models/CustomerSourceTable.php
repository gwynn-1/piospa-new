<?php
/**
 * Created by PhpStorm.
 * User: nhu
 * Date: 13/03/2018
 * Time: 1:10 CH
 */

namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;


class CustomerSourceTable extends  Model
{
    use ListTableTrait;

    /*
     * table service_package
     */
    protected $table = 'customer_source' ;
    protected $primaryKey = 'customer_source_id';

    /*
     * fill table
     * $var array
     */
    protected $fillable = ['customer_source_id', 'customer_source_name', 'customer_source_code', 'customer_source_description', 'is_active', 'is_delete', 'created_at', 'updated_at', 'created_by', 'updated_by'] ;

    /*
     * Build query table
     * @author doan thi huynh nhu
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function _getList()
    {
        return $this->select('customer_source_id', 'customer_source_name', 'customer_source_code', 'customer_source_description', 'is_active', 'is_delete', 'created_at', 'updated_at', 'created_by', 'updated_by')->where('is_delete',0)->orderBy($this->primaryKey,'desc');
    }
    // function remove item
    public function remove($id)
    {
        return $this->where($this->primaryKey,$id )->update(['is_delete'=> 1]);
    }
    /*
     * function edit
     */
    public function edit(array $data ,$id){

        return $this->where($this->primaryKey,$id)->update($data) ;

    }
    /*
     * function add
     */
    public function add(array $data){

        $oCustomerGroup =  $this->create($data);
        return $oCustomerGroup->customer_source_id ;
    }
    /*
     * function getItem
     */
    public function getItem($id){
        return $this->where($this->primaryKey,$id )->first();
    }


    public function getOptionCustomerSource()
    {
        return $this->select('customer_source_id','customer_source_name')->get();
    }
}