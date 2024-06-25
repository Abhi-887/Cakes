<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CustomerfeedbackDataTable;
use App\Http\Controllers\Controller;
use App\Models\Customerfeedback;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mail;

class CustomerfeedbackController extends Controller
{
    function index(CustomerfeedbackDataTable $dataTable) : View|JsonResponse {
        return $dataTable->render('admin.customer-feedback.index');
    }
}
