<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResumeResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'template' => $this->template,
            'country' => $this->country,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'Zipcode' => $this->Zipcode,
            'email' => $this->email,
            'phone' => $this->phone,
            'skills' => $this->skills,
            'language' => $this->language,
            'professional_summary' => $this->professional_summary,
            'experiences_data' => [],
            'education_data' => [],
            'links' => [],
            'add_section' => [],
        ];
    }
}
