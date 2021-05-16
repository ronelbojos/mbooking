<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * @return Room[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Room::all();
    }

    /**
     *
     */
    public function store()
    {
       Room::create(request()->validate([
           'room_name' => 'required',
           'room_number' => 'required',
       ])) ;
    }
}
