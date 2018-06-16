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
            // 'experience' => $experience
        ];
        return response()->json($data);
    }
}
