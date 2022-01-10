<?php

namespace App\Http\Controllers\Api;

use App\Models\Equipment;
use App\Models\EquipmentMove;
use App\Models\EquipmentLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EquipmentMove as EquipmentMoveResource;
use Carbon\Carbon;

class EquipmentMoveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(EquipmentMove::all(), 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //자산이동 신청(param: id, req사번, res사번, req_dt, req_comment)
    {
        $equipment = new EquipmentMove();
        $equipment->ei_seq = $request->input('id');
        $equipment->ns_tagnumber = $request->input('ns_tagnumber');
        $equipment->ns_serialnumber = $request->input('ns_serialnumber');
        $equipment->req_user_no = $request->input('req_user_no');
        $equipment->res_user_no = $request->input('res_user_no');
        $equipment->req_dt = $request->input('req_dt');
        $equipment->req_comment = $request->input('req_comment');
        $equipment->mov_status = $request->input('mov_status'); //1: 신청, 2:승인, 3:반려
        $equipment->save();
        logger($equipment);
        return response()->json(['재고이동'=>$equipment, 'mesaage'=>'자산이동이 요청되었습니다',]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipment = EquipmentMove::where('res_user_no', $id)->where('mov_status', '1')->get();
        if($equipment == null){
            return response()->json(['message' => '이동 요청된 자산이 없습니다.'], 200, [], JSON_UNESCAPED_UNICODE);
            }
        // return response()->json($userInfo, 200, [], JSON_UNESCAPED_UNICODE);
        return EquipmentMoveResource::collection($equipment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //자산이동 승인(param: id, res사번, res_dt, res_comment, mov_ststus)
    {
        $equipmentMove = EquipmentMove::where('id', $id)->where('mov_status', '1')->first();
        if($equipmentMove === null){
            return response()->json(['message' => '해당되는 자산이 없습니다.'], 200, [], JSON_UNESCAPED_UNICODE);
            }
        $equipmentMove->res_dt = $request->input('res_dt');
        $equipmentMove->res_comment = $request->input('res_comment');
        $equipmentMove->mov_status = $request->input('mov_status'); //1: 신청, 2:승인, 3:반려
        $equipmentMove->save();
        logger($equipmentMove);

        if ($equipmentMove->mov_status === '2'){
            $equipmentMoveFix = EquipmentMove::where('id', $id)->where('mov_status', '2')->first();
            $equipment = Equipment::where('ei_seq', $equipmentMoveFix->ei_seq)->first();
            $equipmentLog = new EquipmentLog();
            //equipment_info 정보 갱신
            $equipment->user_no = $equipmentMoveFix->res_user_no;
            $equipment->re_user_no = $equipmentMoveFix->req_user_no;
            $equipment->mngt_user_no = $equipmentMoveFix->res_user_no;
            $equipment->remark1 = $equipmentMoveFix->req_comment;
            $equipment->out_dt = $equipmentMoveFix->res_dt;
            $equipment->update_dt = Carbon::now();
            $equipment->save();
            //equipment_log 이력 추가
            $equipmentLog->ei_seq = $equipmentMoveFix->ei_seq;
            $equipmentLog->user_no = $equipmentMoveFix->res_user_no;
            $equipmentLog->as_mngr_nm = $equipmentMoveFix->res_user_no;
            $equipmentLog->remark1 = $equipmentMoveFix->req_comment;
            $equipmentLog->out_dt = $equipmentMoveFix->res_dt;
            $equipmentLog->reg_dt = Carbon::now();
            $equipmentLog->save();

            logger($equipment);

            return response()->json(['재고이동'=>$equipmentMove, 'mesaage'=>'자산이동이 처리 되었습니다',]);
        }
        elseif($equipmentMove->mov_status  === '3'){
            return response()->json(['재고이동'=>$equipmentMove, 'mesaage'=>'자산이동이 취소 되었습니다',]);
        }else{
            return response()->json(['재고이동'=>$equipmentMove, 'mesaage'=>'자산이동이 미처리 되었습니다',]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
