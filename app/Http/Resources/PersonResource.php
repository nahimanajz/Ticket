<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return parent::toArray($request); //this return every column found in this model
        //specifying columns I want
       /* return [ 
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
        ];
        */
    }
}
