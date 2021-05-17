<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;
use function response;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookingResource::collection(Booking::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking = Booking::create($this->validatedRequest());

        return response()->json($booking, 201);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Booking $booking
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Booking $booking)
    {
        $booking->update($this->validatedRequest());

        return response()->json($booking, 200);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param Booking $booking
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
       $booking->delete();

       return response()->json(null, 204);
    }

    /**
     * Validate request data
     *
     * @return array
     */
    protected function validatedRequest()
    {
        return request()->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
        ]);
    }
}
