<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeapYearController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function checkLeapYear(Request $request)
    {
        $request->validate([
            'year' => 'required|date_format:Y'
        ]);

        $year = $request->year;

        switch(true)
        {
            case ($year % 400 == 0):
            case ($year % 4 == 0 && $year % 100 != 0):
                $isLeapYear = true;
                break;
            default:
                $isLeapYear = false;
                break;
        }

        return view('home.index', [
            'isLeapYear' => $isLeapYear
        ]);
    }
}
