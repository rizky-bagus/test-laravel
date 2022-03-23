<?php

namespace App\Services;

use App\Services\GuzzleService;
use Yajra\DataTables\Facades\DataTables;

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
        return DataTables::of($productData)->addIndexColumn()->make(true);
    }

    public function getDetailProduct($id)
    {
        $url = env('HOST_API').'product/'.$id;
        $productData = json_decode($this->guzzleService->bearerRequestGet($url)->getContent(), false);
        return $productData;
    }
}
