<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\WeddingcakesdepositDataTable;
use App\Http\Controllers\Controller;
use App\Models\Weddingcakesdeposit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mail;

class WeddingcakesdepositController extends Controller
{
    function index(WeddingcakesdepositDataTable $dataTable) : View|JsonResponse {
        return $dataTable->render('admin.weddingcakesdeposit.index');
    }
}
