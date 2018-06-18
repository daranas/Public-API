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
        $experience = "test";
        $data = [
            'name' => 'Darana Sukma Vidya',
            'email' => 'darana.sv@gmail.com',
            'phone' => '082121770707',
            'born' => '16 September 1991'
            // 'experience' => $experience
        ];
        return response()->json($data);
    }
}
