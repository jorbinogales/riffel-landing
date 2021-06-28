<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LawyerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birth' => $this->birth,
            'picture' => $this->picture,
            'answerings' => $this->answerings,
            'skills' => $this->skills,
            'rewards' => $this->rewards,
        ];
    }
}
