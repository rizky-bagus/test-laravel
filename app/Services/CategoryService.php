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
class CategoryService
{
    protected $guzzleService;

    public function __construct(GuzzleService $guzzleService)
    {
        $this->guzzleService = $guzzleService;
    }

    public function getDataCategory()
    {
        $url = env('HOST_API').'product';
        $categoryData = json_decode($this->guzzleService->bearerRequestGet($url)->getContent(), false);

        try {
            return $categoryData;
        } catch (\Exception $th) {
            throw $th;
        }
    }
}
