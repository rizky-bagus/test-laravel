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
        $url = env('HOST_API').'product/asda';
        $productData = json_decode($this->guzzleService->bearerRequestGet($url)->getContent(), false);

        try {
            return DataTables::of($productData)->addIndexColumn()->make(true);
        } catch (\Exception $th) {
            Log::error("fail Connect To Datatable.");
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
