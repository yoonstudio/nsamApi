<?php

namespace App\Http\Controllers;
use App\Models\Equipment;
use App\Http\Resources\Equipment as EquipmentResource;
use Illuminate\Http\Request;

class PopupController extends Controller
{
    public function eqmtpopup(Request $request){
        $param = $request->input('user_no');
        $userEquipments = Equipment::where('user_no', $param)->get();
        $data = $userEquipments;
        // $data = (string)EquipmentResource::collection($userEquipments);
        return view('popup.pop')->with('data', $data);
    }

    public function usrlstpopup(Request $request){
        $data = $request->input('dept_code');
        return $data;
        // return view('popup.pop')->with('data', $data);
    }

}

