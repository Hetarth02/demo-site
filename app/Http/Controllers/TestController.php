<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function display()
    {
        $data = Test::all();
        return response($data);
    }

    public function form(Request $request)
    {
        $input = $request->all();
        $timestamp = Carbon::createFromTimestamp(strtotime($input['date'].$input['time']))->format('d-M-Y, H:i');
        $data = [
            [
                'name' => $input['fname'],
                'email' => $input['email'],
                'num' => $input['number'],
                'timestamp' => $timestamp,
            ]
        ];
        try {
            Test::where('clients', 'exists', true)->push('clients', $data);
            return response()->json(true);
        } catch (Exception $error) {
            return response()->json(false);
        }
    }

    public function display_form()
    {
        return view('form');
    }
}
