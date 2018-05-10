<?php
/**
 * Created by PhpStorm.
 * User: SonVeratti
 * Date: 3/26/2018
 * Time: 4:33 PM
 */

namespace Modules\Admin\Models;

use Box\Spout\Common\Type;
use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;
use Illuminate\Support\Facades\DB;
use Box\Spout\Reader\ReaderFactory;


class StoreTable extends Model
{
    use ListTableTrait;
    protected $table = "stores";
    protected $primaryKey = "store_id";

    //function fillable
    protected $fillable = [
        'store_id', 'store_name', 'province_id', 'district_id', 'ward_id', 'address', 'latitude',
        'longitude', 'is_active', 'created_at', 'updated_at', 'created_by', 'updated_by', 'store_image'
    ];

    //function get list
    protected function _getList()
    {
        $oSelect = $this->from($this->table . ' as store')
            ->leftJoin('ward', 'ward.wardid', '=', 'store.ward_id')
            ->leftJoin('district', 'district.districtid', '=', 'store.district_id')
            ->leftJoin('province', 'province.provinceid', '=', 'store.province_id')
            ->select('store_id', 'store_name', 'address', 'latitude', 'longitude', 'is_active'
                , 'created_at', 'updated_at', 'created_by', 'updated_by', 'store_image', 'ward.name as ward_name',
                'district.name as district_name', 'province.name as province_name')->where('store.is_delete', 0);
//        dd($oSelect->get());

        return $oSelect;
    }

    //function add
    public function add(array $data)
    {
//        dd($data);
        $oStore = $this->create($data);
        return $oStore->id;
    }

    //function remove
    public function remove($id)
    {
        $this->where($this->primaryKey, $id)->update(['is_delete' => 1]);
    }

    //function edit
    public function edit(array $data, $id)
    {
        return $this->where($this->primaryKey, $id)->update($data);
    }

    //function get item
    public function getItem($id)
    {
        return $this->leftJoin('ward', 'ward.wardid', '=', 'stores.ward_id')
            ->leftJoin('district', 'district.districtid', '=', 'stores.district_id')
            ->leftJoin('province', 'province.provinceid', '=', 'stores.province_id')
            ->select("stores.*", "province.name as province_name", "province.provinceid as province_id", 'ward.name as ward_name',
                "ward.wardid as ward_id",
                'district.name as district_name', "district.districtid as district_id")
            ->where($this->primaryKey, $id)->first();
    }


    public function getStoreOption()
    {
        return $this->select('store_id', 'store_name')->get()->toArray();
    }

    public function exportExecl(array $array)
    {

        $store = DB::table($this->table)
            ->leftJoin('province', 'province.provinceid', '=', 'stores.province_id')
            ->leftJoin('district', 'district.districtid', '=', 'stores.district_id')
            ->leftJoin('ward', 'ward.wardid', '=', 'stores.ward_id')
            ->select($array)->get();
//        dd($store);
        return $store;

    }

    public function importExcel($file_name, $title)
    {
        $reader = ReaderFactory::create(Type::XLSX);
        $reader->open($file_name);
        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $key => $row) {
                if ($key == 1)
                {
                }
                elseif ($key != 1 && $row[0] != '')
                {
                    DB::table("stores")
//                        ->leftJoin('ward', 'ward.wardid', '=', 'stores.ward_id')
//                        ->leftJoin('district', 'district.districtid', '=', 'stores.district_id')
//                        ->leftJoin('province', 'province.provinceid', '=', 'stores.province_id')
                        ->insert([
                            "store_id" => $row[0],
                            "store_name" => $row[1],
                            "address" => $row[2],
//                            "province.name as province_name"=>$row[3],
//                            "district.name as district_name"=>$row[4],
//                            "ward.name as ward_name"=>$row[5],
                            "created_at" => $row[3],
                        ]);

                }
            }
        }
        $reader->close();
    }
}