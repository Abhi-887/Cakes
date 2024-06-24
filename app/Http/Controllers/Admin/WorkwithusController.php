<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\WorkwithusDataTable;
use App\Http\Controllers\Controller;
use App\Models\Workwithus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mail;

class WorkwithusController extends Controller
{
    function index(WorkwithusDataTable $dataTable) : View|JsonResponse {
        return $dataTable->render('admin.work-with-us.index');
    }
}
