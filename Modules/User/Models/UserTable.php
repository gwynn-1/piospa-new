<?php
namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

/**
 * User Model
 * 
 * @author isc-daidp
 * @since Feb 23, 2018
 */
class UserTable extends Model
{
    use ListTableTrait;
    
    protected $table = 'users';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active'
    ];
    
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    /**
     * Build query table
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function _getList()
    {
        return $this->select('id', 'name', 'email', 'is_active', 'created_at', 'updated_at');
    }
    
    
    /**
     * Remove user
     * 
     * @param number $id
     */
    public function remove($id)
    {
        $this->where($this->primaryKey, $id)->delete();
    }
    
    
    /**
     * Insert user to database
     * 
     * @param array $data
     * @return number
     */
    public function add(array $data)
    {
        $oUser = $this->create($data);
        return $oUser->id;
    }
}