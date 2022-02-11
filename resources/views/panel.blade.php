<!DOCTYPE html>
<head>
    <script type="text/javascript" language="javascript">

        function openPop($frm){
            window.open('', 'popwin', 'width=500, height=500, scrollbars=yes');
            $frm.action = 'popup';
            $frm.submit();
        }

    </script>

</head>
<body>
<br>
    token : {{ $user }}
    <p>
    </p>
    <tr>
        <td>
            <form name="eqmt" id="eqmt" method="post" target="popwin">
                @csrf
                <input type="text" value = "사번" name = "user_no" id = "user_no">
                <input type="button" value = "유저별 자산 조회" onClick="openPop(eqmt);">
            </form>
        </td>
        <p>
        </p>
        <td>
            <form name="usrlst" id="usrlst" method="post" target="popwin">
                @csrf
                <input type="text" value = "조직" name = "dept_code" id = "dept_code">
                <input type="button" value = "조직별 유저 조회" onClick="openPop(usrlst);">
            </form>
        </td>
        <p>
        </p>
        <td>
            <form name="eqmtmv" id="eqmtmv" method="get" target="popwin">
                <input type="button" value = "자산이동 현황" onClick="openPop(eqmtmv);">
            </form>
        </td>
        <p>
        </p>
        <td>
            <form name="usreqm" id="usreqm" method="post" target="popwin">
                <input type="text" value = "사번" name = "user_no" id = "user_no">
                <input type="button" value = "유저별 자산이동요청 조회" onClick="openPop(usreqm);">
            </form>
        </td>
        <td>
            <input type="button" value = "자산이동 신청">
        </td>
        <td>
            <input type="button" value = "자산이동 승인">
        </td>
    </tr>
</body>
</html>

 {{-- Route::get('/equipments/{id}', [EquipmentsController::class, 'show']); //유저별 자산 조회(param: 사번)

 // Route::get('/userinfo', [UserInfoController::class, 'index']);
 Route::get('/userinfo/{id}', [UserInfoController::class, 'show']); //조직별 유저 조회(param: 조직코드)

 Route::get('/equipmentmove', [EquipmentMoveController::class, 'index']); //자산이동 현황
 Route::get('/equipmentmove/{id}', [EquipmentMoveController::class, 'show']); //유저별 자산이동요청 조회(param: 사번)
 Route::post('/equipmentmove', [EquipmentMoveController::class, 'store']); //자산이동 신청(param: id, req사번, res사번, req_dt, req_comment)
 Route::put('/equipmentmove/{id}', [EquipmentMoveController::class, 'update']); //자산이동 승인(param: id, res사번, res_dt, res_comment, mov_ststus) --}}
