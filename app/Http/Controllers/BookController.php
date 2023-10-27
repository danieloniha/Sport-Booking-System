<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BookController extends Controller
{
    //
    public function book()
    {
        return view('admin.book.book');
    }

    public function create(Request $req)
    {
        $date = $req->input('date_of_use');
        $sport = $req->input('sport');
        $field = $req->input('field');

        $isDateAvailable = $this->findAvailableDates($date, $field);
        if (!$isDateAvailable) {
            $notification = array(
                'message' => 'Date is not available. Please choose another date.',
                'alert-type' => 'error'
            );
            return redirect('book')->with($notification);
        }
        $books = new books();
        $books->date_of_use = $date;
        $books->sport_id = $sport;
        $books->field_id = $field;
        $books->price = $req->price;
        $books->save();
        $notification = array(
            'message' => 'Appointment Booked Successfully',
            'alert-type' => 'success'
        );
        return redirect('book')->with($notification);



        $books->save();
        $notification = array(
            'message' => 'Appointment Booked Successfully',
            'alert-type' => 'success'
        );
        return redirect('book')->with($notification);
    }

    private function findAvailableDates($date, $field)
    {
        // Your custom logic to find available dates
        $existingBookings = Books::where('date_of_use', $date)
            ->where('field_id', $field)
            ->count();

        // Return true if the date is not available, and false if it is available
        return $existingBookings > 0 ? false : true;
    }
}
