<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ShiftCalendarController extends Controller
{
    public function index()
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(12) && $userPermission->isBasicDepartment() && $userPermission->getEmployeeStatus() == 1) {
            return redirect()->route('home.index');
        }
        return view('calendar.shift', ['userPermission' => $userPermission]);
    }

    public function download(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(12) && $userPermission->isBasicDepartment()) {
            return redirect()->back();
        }
        if ($request->session()->has('shift-pdf-data')) {
            $message = $request->session()->get('shift-pdf-data');
        } else {
            return redirect()->back();
        }

        $pdf = Pdf::loadView('calendar.shift-template', $message);
        return $pdf->download('document.pdf');
    }
}
