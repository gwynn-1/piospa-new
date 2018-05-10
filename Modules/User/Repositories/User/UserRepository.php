<?php
namespace Modules\User\Repositories\User;

use Modules\User\Models\UserTable;

/**
 * User repository
 * 
 * @author isc-daidp
 * @since Feb 23, 2018
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * @var UserTable
     */
    protected $user;
    protected $timestamps = true;
    
    
    public function __construct(UserTable $user)
    {
        $this->user = $user;    
    }
    
    
    /**
     * Lấy danh sách user
     */
    public function list(array $filters = [])
    {
        return $this->user->getList($filters);
    }
    
    
    /**
     * Xóa user
     */
    public function remove($id)
    {
        $this->user->remove($id);
    }
    
    
    /**
     * Thêm user
     */
    public function add(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        
        return $this->user->add($data);
    }
}