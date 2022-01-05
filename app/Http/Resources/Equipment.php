<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Equipment extends JsonResource
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
            '태그번호'=>$this->ns_tagnumber,
            '사번'=>$this->user_no,
            '모델명'=>$this->model_number,
            '시리얼'=>$this->ns_serialnumber,
            '상태'=>$this->ei_status,
            '적요'=>$this->remark1,

        ];
    }
}
