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

        switch(0)
        {
            case $request->year % 400:
            case $request->year % 4:
                $isLeapYear = true;
            default:
                $isLeapYear = false;
        }

        return view('home.index', [
            'isLeapYear' => $isLeapYear
        ]);
    }
}
