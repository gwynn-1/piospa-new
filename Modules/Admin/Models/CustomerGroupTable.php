<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 13/03/2018
 * Time: 1:10 CH
 */

namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

/**
 * ServiceGroupTable
 * @author thachleviet
 * @since March 13, 2018
 */
class CustomerGroupTable extends  Model
{
    use ListTableTrait;

    /*
     * table service_package
     */
    protected $table = 'customer_group' ;
    protected $primaryKey = 'customer_group_id';

    /*
     * fill table
     * $var array
     */
    protected $fillable = ['customer_group_id', 'customer_group_name', 'customer_group_code', 'customer_group_description', 'customer_group_image', 'is_active', 'is_delete', 'created_at', 'updated_at', 'created_by', 'updated_by'] ;

    /*
     * Build query table
     * @author thach le viet
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function _getList()
    {
        
        
        return $this->select('customer_group_id', 'customer_group_name', 'customer_group_code', 'customer_group_description', 'customer_group_image', 'is_active', 'is_delete', 'created_at', 'updated_at', 'created_by', 'updated_by')->where('is_delete',0)->orderBy($this->primaryKey,'desc');
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

        return $this->where($this->primaryKey,$id)->update($data);

    }
    /*
     * function save
     */

    /*
     * function add
     */
    public function add(array $data){
        $oCustomerGroup =  $this->create($data);
        return $oCustomerGroup->customer_group_id ;
    }
    /*
     * function getItem
     */
    public function getItem($id){
        return $this->where($this->primaryKey,$id )->first();
    }
}