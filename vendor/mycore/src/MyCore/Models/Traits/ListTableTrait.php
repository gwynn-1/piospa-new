<?php
namespace MyCore\Models\Traits;

/**
 * Filter table
 * 
 * @author isc-daidp
 * @since Feb 23, 2018
 */
trait ListTableTrait
{
    /**
     * Get Table list
     * 
     * @param array $filter
     */
    public function getList(array $filter = [])
    {
        $select  = $this->_getList();
        $page    = (int) ($filter['page'] ?? 1);
        $display = (int) ($filter['display'] ?? PAGING_ITEM_PER_PAGE);
        // search term
        if (!empty($filter['search_type']) && !empty($filter['search_keyword']))
        {
            $select->where($filter['search_type'], 'like', '%' . $filter['search_keyword'] . '%');
        }
        unset($filter['search_type'], $filter['search_keyword'], $filter['page'], $filter['display']);

        // filter list
        foreach ($filter as $key => $val)
        {
            if (trim($val) == '') {
                continue;
            }
            
            $select->where(str_replace('$', '.', $key), $val);
        }

        return $select->paginate($display, $columns = ['*'], $pageName = 'page', $page);
    }
}