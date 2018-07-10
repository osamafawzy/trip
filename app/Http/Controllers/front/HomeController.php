<?php

namespace App\Http\Controllers\front;

use App\Models\Advantages;
use App\Models\BulidTrip;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Subscribe;
use App\Models\Transfer;
use App\Models\Trip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $sliders = Slider::all();
        $advantages = Advantages::all();
        $latestTrips = Trip::take('7')->orderBy('id','desc')->get();
        return view('front.index',compact('categories','sliders','latestTrips','advantages'));
    }

    public function getByCategory($url_slug,$url_slug1=null)
    {
        $categories = Category::all();
        if($url_slug1 != null){
            $category = Category::where('url_slug',$url_slug1)->firstOrFail();
        }else{
            $category = Category::where('url_slug',$url_slug)->firstOrFail();
        }
        $trips = $category->trips;
        return view('front.pages.category',compact('categories','trips','category'));
    }
    public function trip($url_slug1, $url_slug)
    {
        $categories = Category::all();
        $trip = Trip::where('url_slug', $url_slug)->first();
        $category = Category::where('url_slug', $url_slug1)->firstOrFail();
//        $latestTrips = $category->trips->take('3');
        $latestTrips = Trip::take('3')->orderBy('id','desc')->get();
        $reviews = Review::where('trip_id', $trip->id)->get();
        return view('front.pages.trip', compact('trip', 'categories', 'latestTrips', 'category', 'reviews'));
    }

    public function review($url_slug1, $url_slug,Request $request)
    {
        $categories = Category::all();
        $trip = Trip::where('url_slug', $url_slug)->first();
        $review = new Review();
        $review->title = $request['title'];
        $review->description = $request['description'];
        $review->trip_id = $trip->id;
        $review->save();

        $rating = new \willvincent\Rateable\Rating;

        $rating->rating = $request->rate;

        $rating->review_id = $review->id;


        $review->ratings()->save($rating);


        return redirect()->back();

    }

    public function bookTrip($url_slug)
    {
        $categories = Category::all();
        $trip = Trip::where('url_slug', $url_slug)->first();
        $latestTrips = Trip::take('3')->orderBy('id','desc')->get();
        return view('front.pages.book_trip',compact('categories','trip','latestTrips'));
    }

    public function transfer()
    {
        $categories = Category::all();
        $latestTrips = Trip::take('3')->orderBy('id','desc')->get();
        return view('front.pages.transfer',compact('categories','latestTrips'));
    }

    public function buildTrip()
    {
        $categories = Category::all();
        $latestTrips = Trip::take('3')->orderBy('id','desc')->get();
        return view('front.pages.build_trip',compact('categories','latestTrips'));
    }
    public function buildTripStore(Request $request){
        $this->validate($request,[
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email',
            'dep_date' => 'required',
            'arr_date' => 'required',
            'phone_number' => 'required',
            'arr_country' =>'required',
            'dep_country' => 'required',
            'is_receive_promotion' => 'required',
            'captcha' => 'required|captcha',
        ],[
            'captcha' => 'the letters you have entered isn\'t correct',
        ]);


        $bulidtrip = new BulidTrip();
        $bulidtrip->gendre = $request->gendre;
        $firstname = $request->first_name;
        $lastname = $request->last_name;
        $bulidtrip->name =$firstname.' '.$lastname;

        $bulidtrip->email = $request->email;
        $bulidtrip->country_code = $request->country_code;
        $bulidtrip->phone = $request->phone_number;
        $bulidtrip->dep_date = $request->dep_date;
        $bulidtrip->arr_date = $request->arr_date;
        $bulidtrip->dep_country =$request->dep_country;
        $bulidtrip->arr_country = $request->arr_country;
        $bulidtrip->message = $request->message;

        $bulidtrip->save();
        return redirect()->back();
    }

    public function transferStore(Request $request){

        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required',
            'date_transfer' => 'required',
            'phone_number' => 'required',
            'goal' =>'required',
            'group_size' => 'required',
            'captcha' => 'required|captcha',
        ],[
            'captcha' => 'the letters you have entered isn\'t correct',
        ]);

        $transfer = new Transfer();
        $firstname = $request->first_name;
        $lastname = $request->last_name;
        $transfer->name =$firstname.' '.$lastname;
        $transfer->gendre = $request->gendre;
        $transfer->email = $request->email_address;
        $transfer->country_code = $request->country_code;
        $transfer->phone = $request->phone_number;
        $transfer->date_transfer = $request->date_transfer;
        $transfer->start_point = $request->start_point;
        $transfer->goal =$request->goal;
        $transfer->group_size = $request->group_size;
        $transfer->additional_wishes = $request->additional_wishes;
        $transfer->save();

        return redirect()->back();
    }

    public function refreshCaptcha(){
        return response()->json(['captcha' => captcha_img()]);
    }

    public function bookTripStore(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'email_address' => 'required',
            'arrival' => 'required',
            'departure' => 'required',
            'adult' =>'required',
            'children' => 'required',
            'captcha' => 'required|captcha',
        ],[
            'captcha' => 'the letters you have entered isn\'t correct',
        ]);

        $booking = new Booking();
        $booking->name = $request->name;
        $booking->trip_id = $request->trip_id;
        $booking->email = $request->email_address;
        $booking->arrival = $request->arrival;
        $booking->departure = $request->departure;
        $booking->adult = $request->adult;
        $booking->children = $request->children;
        $booking->message = $request->message;

        $booking->save();

        return redirect()->back();
    }





    //Admin View

    public function bulidTripShow(){
        $trips = BulidTrip::all();
        return view('admin.bulid-trip.index',compact('trips'));
    }
    public function bulidTripDestroy($id){
        $trip = BulidTrip::find($id);
        $trip->delete();
        return redirect()->back();
    }
    public function transferShow(){
        $transfers = Transfer::all();
        return view('admin.transfer.index',compact('transfers'));
    }
    public function transferDestroy($id){
        $transfer = Transfer::find($id);
        $transfer->delete();
        return redirect()->back();
    }

    public function subscribe(Request $request){
        $subscribe = new Subscribe();
        $subscribe->email = $request->email;
        $subscribe->save();
        return redirect('/home');
    }

}
