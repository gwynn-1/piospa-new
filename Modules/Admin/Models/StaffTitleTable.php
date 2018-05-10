<?php
/**
 * Created by PhpStorm.
 * User: SonVeratti
 * Date: 3/17/2018
 * Time: 1:26 PM
 */

namespace Modules\Admin\Models;
use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class StaffTitleTable extends Model
{
    use ListTableTrait;
    protected $table = 'staff_title';
    protected $primaryKey='staff_title_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staff_title_id', 'staff_title_name','staff_title_code', 'staff_title_description',
        'is_active','is_delete' ,'created_at', 'updated_at', 'created_by', 'updated_by'
    ];
    protected function _getList()
    {
        return $this->select('staff_title_id', 'staff_title_name','staff_title_code', 'staff_title_description',
            'is_active','is_delete', 'created_at', 'updated_at', 'created_by', 'updated_by')->where('is_delete',0);
    }

    public function add(array $data)
    {
        $oTitle=$this->create($data);
        return $oTitle->id;
    }
    public function remove($id)
    {
        $this->where($this->primaryKey,$id)->update(['is_delete'=>1 ]);
    }
    public function edit(array $data,$id){
        return $this->where($this->primaryKey,$id)->update($data);
    }
    public function getEdit($id){
        return $this->where($this->primaryKey,$id)->first();
    }


    public function getStaffTitleOption(){
        return $this->select('staff_title_id', 'staff_title_name')->get()->toArray();
    }
}