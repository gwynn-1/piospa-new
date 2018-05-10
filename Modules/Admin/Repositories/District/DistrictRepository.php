<?php
/**
 * Created by PhpStorm.
 * User: SonVeratti
 * Date: 3/27/2018
 * Time: 12:44 PM
 */

namespace Modules\Admin\Repositories\District;
use Modules\Admin\Models\DistrictTable;

class DistrictRepository implements DistrictRepositoryInterface
{
    protected $district;
    protected $timestamp=true;

    public function __construct(DistrictTable $district)
    {
        $this->district=$district;
    }

    public function getOptionDistrict($id)
    {

        $listData=array();
        foreach ($this->district->getOptionDistrict($id) as $key=>$value)
        {
            $listData[$value['districtid']]=$value['name'];
        }
        return $listData;
    }
}