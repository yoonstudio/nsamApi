<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentMove extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            '요청번호'=>$this->id,
            '일련번호'=>$this->ei_seq,
            '태그번호'=>$this->ns_tagnumber,
            // '모델명'=>$this->model_number,
            '시리얼'=>$this->ns_serialnumber,
            '요청자'=>$this->req_user_no,
            '요청일'=>$this->req_dt,
            '상태'=>$this->mov_status,
            '적요'=>$this->req_comment,
        ];
    }
}
