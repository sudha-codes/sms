<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Display top scorers
    public function topScorers()
    {
        $topStudents = Student::orderByDesc('marks')->take(10)->get();
        $students = Student::orderByDesc('marks')->take(10)->get();

    $chartLabels = $students->pluck('name');  // ["John", "Jane", "Mike"]
    $chartData = $students->pluck('marks');   // [95, 90, 88]

    return view('reports.index', compact('chartLabels', 'chartData','topStudents'));

        // return view('reports.index', compact('topStudents'));
    }
}
