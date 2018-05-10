<?php
/**
 * Created by PhpStorm.
 * User: nhu
 * Date: 13/03/2018
 * Time: 1:48 CH
 */

namespace Modules\Admin\Repositories\CustomerSource;


use Modules\Admin\Models\CustomerSourceTable;



class CustomerSourceRepository implements CustomerSourceRepositoryInterface
{

    /**
     * @var CustomerSourceTable
     */
    protected $customerSource;
    protected $timestamps = true;
    public function __construct(CustomerSourceTable $customerSource)
    {
        $this->customerSource = $customerSource;
    }
    /**
     *get list customers Group
     */
    public function list(array $filters = [])
    {
        return $this->customerSource->getList($filters);
    }
    /**
     * delete customers Group
     */
    public function remove($id)
    {
         $this->customerSource->remove($id);
    }
    /**
     * add customers Group
     */
    public function add(array $data)
    {

        return $this->customerSource->add($data);
    }
    /*
     * edit customers Group
     */
    public function edit(array $data ,$id)
    {

        try{
            return $this->customerSource->edit($data ,$id);

        }
        catch(\Exception  $e){
            $e->getMessage();
        }
    }
    /*
     *  update or add
     */
    public function save(array $data ,$id)
    {
        if(!empty($id)){
            return $this->customerSource->edit($data ,$id);
        }else{

            return $this->customerSource->add($data);
        }
    }
    public function getItem($id)
    {
        return $this->customerSource->getItem($id);
    }
    public function getOptionCustomerSource()
    {
        $array=array();
        foreach ($this->customerSource->getOptionCustomerSource() as $value) {
            $array[$value['customer_source_id']]=$value['customer_source_name'];
        }
        return $array;
    }
}