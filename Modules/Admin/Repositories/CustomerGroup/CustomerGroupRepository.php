<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 13/03/2018
 * Time: 1:48 CH
 */

namespace Modules\Admin\Repositories\CustomerGroup;


use Modules\Admin\Models\CustomerGroupTable;



class CustomerGroupRepository implements CustomerGroupRepositoryInterface
{

    /**
     * @var CustomerGroupTable
     */
    protected $customerGroup;
    protected $timestamps = true;
    public function __construct(CustomerGroupTable $customerGroup)
    {
        $this->customerGroup = $customerGroup;
    }
    /**
     *get list customer Group
     */
    public function list(array $filters = [])
    {
        return $this->customerGroup->getList($filters);
    }
    /**
     * delete customer Group
     */
    public function remove($id)
    {
        $oItem = $this->customerGroup->getItem($id);
        if(!empty($oItem->customer_group_image)){
            if(is_file(public_path().'/'.$oItem->customer_group_image.'')){
                unlink(public_path().'/'.$oItem->customer_group_image.'');
            }
        }
        $this->customerGroup->remove($id);
    }
    /**
     * add customer Group
     */
    public function add(array $data)
    {
        return $this->customerGroup->add($data);
    }
    /*
     * edit customer Group
     */
    public function edit(array $data ,$id)
    {
        // check has image remove
        if(!empty($data['customer_group_image'])){
            $oItem = $this->customerGroup->getItem($id);
            if(!empty($oItem->customer_group_image)){
                if(is_file(public_path().'/'.$oItem->customer_group_image.'')){
                    unlink(public_path().'/'.$oItem->customer_group_image.'');
                }
            }
        }
        try{
            return $this->customerGroup->edit($data ,$id);
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
            return $this->customerGroup->edit($data ,$id);
        }else{

            return $this->customerGroup->add($data);
        }
    }
    public function getItem($id)
    {
        return $this->customerGroup->getItem($id);
    }

}