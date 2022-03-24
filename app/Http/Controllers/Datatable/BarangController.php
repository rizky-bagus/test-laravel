<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BarangService;
use Illuminate\Support\Facades\Log;

class BarangController extends Controller
{
    protected $barangService;

    public function __construct(BarangService $barangService)
    {
        $this->barangService  = $barangService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            Log::debug('Connect To Datatable.');
            return $this->barangService->generateYajraDatatable();
        } catch (\Throwable $th) {
            Log::error("fail Connect To Datatable.",$th);
        }
            
    }
}
