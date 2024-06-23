<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ConsultationDataTable;
use App\Http\Controllers\Controller;
use App\Models\Consultation;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mail;

class ConsultationController extends Controller
{
    function index(ConsultationDataTable $dataTable) : View|JsonResponse {
        return $dataTable->render('admin.consultation.index');
    }
}
