<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchedularController extends Controller
{
    /**
     * Create Event Method
     * @return response
     */
    public function CreateEvent(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Data reached',
            'data' => $request->all()
        ]);
    }
}
