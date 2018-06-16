<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    // index
    public function index()
    {
        $data = [
            'name' => 'Darana Sukma Vidya',
            'birth' => '16 September 1991'
        ];
        return response()->json($data);
    }
}
