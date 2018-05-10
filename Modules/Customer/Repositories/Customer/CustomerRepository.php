<?php
/**
 * Created by PhpStorm.
 * User: nhu
 * Date: 26/03/2018
 * Time: 21:24
 */

namespace Modules\Customer\Repositories\Customer;
use Modules\Customer\Models\CustomerTable;


class CustomerRepository implements CustomerRepositoryInterface
{

    protected $customer;
    protected $timestamps = true;
    public function __construct(CustomerTable $customer)
    {
        $this->customer = $customer;
    }
    /**
     *get list customer
     */
    public function list(array $filters = [])
    {
        return $this->customer->getList($filters);
    }
    /**
     * delete customer
     */
    public function remove($id)
    {
        return $this->customer->remove($id);
    }
    /**
     * add customer Group
     */
    public function add(array $data)
    {

        return $this->customer->add($data);
    }
    /*
     * edit customer Group
     */
    public function edit(array $data ,$id)
    {
        // check has image remove
        try{
            if ($this->customer->edit($data ,$id) === false) throw new \Exception() ;
            return $id;
        }
        catch(\Exception  $e){
            $e->getMessage();
        }
        return false;
    }
    /*
     *  update or add
     */
    public function save(array $data ,$id)
    {
        if(!empty($id)){
            return $this->customer->edit($data ,$id);
        }else{

            return $this->customer->add($data);
        }
    }
    public function getItem($id)
    {
        return $this->customer->getItem($id);
    }

}