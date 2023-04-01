<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResumeEducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'school_name' => $this->school_name,
            'school_city' => $this->school_city,
            'school_state' => $this->school_state,
            'school_country' => $this->school_country,
            'certification' => $this->certification,
            'startschool_date' => $this->startschool_date,
            'endschool_date' => $this->endschool_date,
            'school_description' =>  $this->school_description,
        ];
    }
}
