<?php

namespace App\Http\Controllers;

use App\Home;
use App\User;
use PDF;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }
    //user reports
    public function user($id)
    {
        $user = User::find($id);
        $pdf = PDF::loadView('admin.pdf', ['user' => $user])->setPaper('A4', 'portrait');
        $fileName = $user->name;
        return $pdf->stream($fileName.'.pdf');
    }

    public function appuser()
    {
        $users = User::where('status', '1')->get();
        $pdf = PDF::loadView('reports.allusers', ['users' => $users])->setPaper('A4', 'Portrait');
        $fileName = 'approved users';
        return $pdf->stream($fileName.'.pdf');
    }
    public function penduser()
    {
        $users = User::where('status', '0')->get();
        $pdf = PDF::loadView('reports.allusers', ['users' => $users])->setPaper('A4', 'Portrait');
        $fileName = 'pending users';
        return $pdf->stream($fileName.'.pdf');
    }

    public function userslist()
    {
        $users = User::all();
        $pdf = PDF::loadView('reports.allusers', ['users' => $users])->setPaper('A4', 'Portrait');
        $fileName = 'userslist';
        return $pdf->stream($fileName.'.pdf');
    }

    //property report
    public function home($id)
    {
        $home = Home::find($id);
        $pdf = PDF::loadView('properties.pdf', ['home' => $home])->setPaper('A4', 'portrait');
        $fileName = $home->name;
        return $pdf->stream($fileName.'.pdf');
    }

    public function propertylist()
        {
         $home = Home::all();
         $pdf = PDF::loadView('properties.allpdf', ['home' => $home])->setPaper('A4', 'Portrait');
         $fileName = 'property list';
         return $pdf->stream($fileName.'.pdf');
        }
    public function propertybooked()
    {
        $home = Home::where('status', 'Booked')->get();
        $pdf = PDF::loadView('properties.allpdf', ['home' => $home])->setPaper('A4', 'Portrait');
        $fileName = 'booked property';
        return $pdf->stream($fileName.'.pdf');
    }
    public function propertyvacant()
    {
        $home = Home::where('status', 'Vacant')->get();
        $pdf = PDF::loadView('properties.allpdf', ['home' => $home])->setPaper('A4', 'Portrait');
        $fileName = 'vacant property';
        return $pdf->stream($fileName.'.pdf');
    }
    public function propertybookable()
    {
        $home = Home::where('availability', 'Bookable')->get();
        $pdf = PDF::loadView('properties.allpdf', ['home' => $home])->setPaper('A4', 'Portrait');
        $fileName = 'bookable property';
        return $pdf->stream($fileName.'.pdf');
    }
    public function propertyunbookable()
    {
        $home = Home::where('availability', 'Un-Bookable')->get();
        $pdf = PDF::loadView('properties.allpdf', ['home' => $home])->setPaper('A4', 'Portrait');
        $fileName = 'un-bookable property list';
        return $pdf->stream($fileName.'.pdf');
    }
    public function propertyunderrepairs()
    {
        $home = Home::where('status', 'Under Repairs')->get();
        $pdf = PDF::loadView('properties.allpdf', ['home' => $home])->setPaper('A4', 'Portrait');
        $fileName = 'under repairs property';
        return $pdf->stream($fileName.'.pdf');
    }
    public function propertyreserved()
    {
        $home = Home::where('status', 'Reserved')->get();
        $pdf = PDF::loadView('properties.allpdf', ['home' => $home])->setPaper('A4', 'Portrait');
        $fileName = 'Reserved property';
        return $pdf->stream($fileName.'.pdf');
    }


        //transaction reports
}
