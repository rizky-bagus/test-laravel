<?php

namespace App\Services;

use App\Services\GuzzleService;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

/**
 * Service for handling module barang
 *
 * @author Rizky Bagus
 */
class BarangService
{
    protected $guzzleService;

    public function __construct(GuzzleService $guzzleService)
    {
        $this->guzzleService = $guzzleService;
    }

    public function generateYajraDatatable()
    {
        $url = env('HOST_API').'product';
        $productData = json_decode($this->guzzleService->bearerRequestGet($url)->getContent(), false);

        try {
            return DataTables::of($productData)
            ->editColumn('weight', function($data) {
                $weight = $data->weight / 1000;
                if ($weight > 1){
                    return number_format($weight,2)." Kg";
                }else{
                    return $data->weight." Gram";
                }
            })
            ->addIndexColumn()->make(true);
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function getDetailProduct($id)
    {
        $url = env('HOST_API').'product/'.$id;
        $productData = json_decode($this->guzzleService->bearerRequestGet($url)->getContent(), false);
        return $productData;
    }
}
