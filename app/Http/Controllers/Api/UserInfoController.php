<?php

namespace App\Http\Controllers\Api;

use App\Models\UserInfo;
use App\Models\Equipment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserInfo as UserInfoResource;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(UserInfo::all(), 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $userInfo = UserInfo::where('user_no', $id)->with('equipments')->get();
        $userInfo = UserInfo::where('dept_code', $id)->where('is_status', 'COM0000001')->get();
        if($userInfo == null){
            return response()->json(['message' => '등록된 구성원이 없습니다.'], 200, [], JSON_UNESCAPED_UNICODE);
            }
        // return response()->json($userInfo, 200, [], JSON_UNESCAPED_UNICODE);
        return UserInfoResource::collection($userInfo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
