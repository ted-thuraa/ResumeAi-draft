<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResumeExperienceResource extends JsonResource
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
            'job_title' => $this->job_title,
            'employer' => $this->employer,
            'job_city' => $this->job_city,
            'job_state' => $this->job_state,
            'job_country' => $this->job_country,
            'startjob_date' => $this->startjob_date,
            'endjob_date' => $this->endjob_date,
            'description' =>  $this->description,
        ];
    }
}
