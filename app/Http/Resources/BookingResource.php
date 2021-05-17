<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'room_id' => $this->room_id,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'room_name' => $this->room->room_name,
            'room_number' => $this->room->room_number,
            'user_name' => $this->user->name,
        ];
    }
}
