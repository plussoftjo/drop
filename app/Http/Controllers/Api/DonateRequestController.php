<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\need;
use Auth;
class DonateRequestController extends Controller
{
    public function store(Request $request) 
    {
        $need = need::create([
            'user_id' => Auth::id(),
            'PatientName' => $request->PatientName,
            'PhoneNumber' => $request->PhoneNumber,
            'PatientFileNumber' => $request->PatientFileNumber,
            'HospitalName' => $request->HospitalName,
            'BloodTypeRequest' => $request->BloodTypeRequest,
            'NumberOfUnit' => $request->NumberOfUnit,
            'Note' => $request->Note,
            'location' => $request->city
        ]);
        return response()->json($need);
    }

    public function index(Request $request) {
        $need = need::where('user_id','!=', Auth::id())->get();
        $myneeds = need::where('user_id',Auth::id())->get();
        return response()->json(['need'=> $need,'myneeds' => $myneeds]);
    }
}
