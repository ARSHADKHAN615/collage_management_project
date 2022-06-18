<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use PDF;
class StudentController extends Controller
{
    public function StudentReport(Student $student)
    {
        $pdf = PDF::loadView('pdf-views.student-report',compact('student'));
        return $pdf->download('student-report.pdf');
    }
}
