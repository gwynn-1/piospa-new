<?php
/**
 * Created by PhpStorm.
 * User: SonVeratti
 * Date: 3/17/2018
 * Time: 1:17 PM
 */

namespace Modules\Admin\Repositories\StaffTitle;
use Modules\Admin\Models\StaffTitleTable;

class StaffTitleRepository implements StaffTitleRepositoryInterface
{
    protected $stafftitle;
    protected $timestamps = true;

    public function __construct(StaffTitleTable $stafftitle)
    {
        $this->stafftitle = $stafftitle;
    }

    /**
     * Lấy danh sách staff title
     */
    public function list(array $filters=[]){
        return $this->stafftitle->getList($filters);
    }

    /**
     * Xóa danh sách product origin
     */
    public function remove($id)
    {
        $this->stafftitle->remove($id);
    }

    /**
     * Thêm  product origin
     */
    public function add(array $data){
        return $this->stafftitle->add($data);
    }
    /**
     * Edit product origin
     */
    public function edit(array $data,$id){
        return $this->stafftitle->edit($data,$id);
    }
    public function getEdit($id)
    {
        // TODO: Implement getEdit() method.
        return $this->stafftitle->getEdit($id);
    }

    public function getStaffTitleOption(){
       $array = [];
       foreach ($this->stafftitle->getStaffTitleOption() as $key=>$item){
           $array[$item['staff_title_id']] = $item['staff_title_name'];
       }
       return $array;
    }
}