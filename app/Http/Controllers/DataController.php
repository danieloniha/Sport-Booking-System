<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\Field;
use App\Models\Books;

class DataController extends Controller
{
    //
    public function index()
    {
        $data = Sport::all();
        return view('admin.book.book', compact('data'));
    }

    public function getField(Request $request)
    {
        //return $request->id;
        $field = Field::select('name', 'id')->where('sport_id', $request->id)->get();
        return response()->json($field);
    }

    public function getPrice(Request $request)
    {
        //return $request->id;
        $price = Field::select('price')->where('id', $request->id)->first();
        return response()->json($price);
    }

    public function getAvailableFields(Request $request)
    {
        $date = $request->input('date');
        $sport = $request->input('sport');

        // Your application logic to check if there are any bookings for the selected sport on the selected date
        $availableDates = $this->findAvailableDates($date, $sport);

        return response()->json($availableDates);
    }

    private function findAvailableDates($date, $sport)
    {
        // Your custom logic to find available dates
        $existingBookings = Books::where('date_of_use', $date)
            ->where('sport_id', $sport)
            ->count();

        // Return available dates based on your logic
        if ($existingBookings > 0) {
            // The date is not available
            return ['available' => false];
        } else {
            // The date is available
            return ['available' => true];
        }
    }
}
