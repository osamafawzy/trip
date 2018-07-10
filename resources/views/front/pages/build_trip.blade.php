
@extends('front.layouts.master')
@section('title')
    IceTrips | Build Trip
@endsection
@section('breadcrumbs')

    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title">Package 4 Columns Fancy</h2>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="#">HOME</a></li>
                <li><a href="#">Packages</a></li>
                <li class="active">Package 4 Columns Fancy</li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <section id="content" class="gray-area">
        <div class="container">
            <div class="row">
                <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                    <div class="booking-section travelo-box">

                        <form class="booking-form" method="post" action="{{url('/home/bulid-trip/store')}}">
                            {{csrf_field()}}
                            <div class="person-information">
                                <h2>Your Personal Information</h2>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>Gender</label>
                                        <div class="selector">
                                            <select name="gendre" class="full-width">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5 {{$errors->has('first_name') ? 'has-error' :''}}">
                                        <label>first name</label>
                                        <input type="text" name="first_name" class="input-text full-width" value="{{old('first_name')}}" placeholder="" />
                                        @if($errors->has('first_name'))
                                            <span class="help-block">
                                                    <strong>{{$errors->first('first_name')}}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5 {{$errors->has('last_name') ? 'has-error' :''}}">
                                        <label>last name</label>
                                        <input type="text" name="last_name" class="input-text full-width" value="{{old('last_name')}}" placeholder="" />
                                        @if($errors->has('last_name'))
                                            <span class="help-block">
                                                    <strong>{{$errors->first('last_name')}}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 col-md-5 {{$errors->has('email') ? 'has-error' :''}}">
                                        <label>email address</label>
                                        <input type="text" name="email" class="input-text full-width" value="{{old('email')}}" placeholder="" />
                                        @if($errors->has('email'))
                                            <span class="help-block">
                                                    <strong>{{$errors->first('email')}}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>Country code</label>
                                        <div class="selector">
                                            <select name="country_code" class="full-width">
                                                @include('front.includes.country_code')
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-5 {{$errors->has('phone_number') ? 'has-error' :''}}">
                                        <label>Phone number</label>
                                        <input type="text" name="phone_number" class="input-text full-width" value="{{old('phone_number')}}" placeholder="" />
                                        @if($errors->has('phone_number'))
                                            <span class="help-block">
                                                    <strong>{{$errors->first('phone_number')}}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5 {{$errors->has('dep_date') ? 'has-error' :''}}">
                                        <label>Departure Date</label>
                                        <input class="date input-text full-width" name="dep_date" value="{{old('dep_date')}}" type="text"/>
                                        @if($errors->has('dep_date'))
                                            <span class="help-block">
                                                    <strong>{{$errors->first('dep_date')}}</strong>
                                                </span>
                                        @endif

                                    </div>
                                    <div class="col-sm-6 col-md-5 {{$errors->has('arr_date') ? 'has-error' :''}}">
                                        <label>Arrivals Date</label>
                                        <input class="date input-text full-width" name="arr_date" value="{{old('arr_date')}}" type="text"/>
                                        @if($errors->has('arr_date'))
                                            <span class="help-block">
                                                    <strong>{{$errors->first('arr_date')}}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5 {{$errors->has('dep_country') ? 'has-error' :''}}">
                                        <label>Departure Country</label>
                                        <input type="text" name="dep_country" class="input-text full-width" value="{{old('dep_country')}}" placeholder="" />
                                        @if($errors->has('dep_country'))
                                            <span class="help-block">
                                                    <strong>{{$errors->first('dep_country')}}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 col-md-5 {{$errors->has('arr_country') ? 'has-error' :''}}">
                                        <label>Arrivals Country</label>
                                        <input type="text" name="arr_country" class="input-text full-width" value="{{old('arr_country')}}" placeholder="" />
                                        @if($errors->has('arr_country'))
                                            <span class="help-block">
                                                    <strong>{{$errors->first('arr_country')}}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-10">
                                        <label>Your Message</label>
                                        <textarea class="input-text full-width" name="message" style="height: 100px">{{old('message')}}</textarea>
                                        {{--<input type="text" name="last_name" class="input-text full-width" value="" placeholder="" />--}}
                                    </div>
                                </div>
                                <div class="form-group row {{$errors->has('captcha') ? 'has-error' :''}}">
                                    <div class="col-sm-6 col-md-5">
                                        <label>Captcha</label>
                                        <div class="captcha">
                                            <span>{!!  captcha_img() !!}</span>
                                            {{--<button type="button" class="btn btn-success btn-refresh">Refresh</button>--}}
                                        </div>
                                        <input type="text" name="captcha" id="captcha" class="input-text full-width" value="" placeholder="Enter Captcha" />
                                        @if($errors->has('captcha'))
                                            <span class="help-block">
                                                    <strong>{{$errors->first('captcha')}}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="is_receive_promotion" value="1" required> I want to receive <span class="skin-color">Travelo</span> promotional offers in the future
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <button type="submit" class="full-width btn-large">CONFIRM BOOKING</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                    <div class="travelo-box">
                        <h4 class="box-title">Last Minute Deals</h4>
                        <div class="image-box style14">
                            @foreach($latestTrips as $trip)
                                <article class="box">
                                    <figure><a href="{{url('home/trip/'.$trip->categories()->first()->url_slug.'/'.$trip->url_slug)}}" title="{{$trip->title}}"><img width="63" height="59" src="{{Request::root()}}/public/uploads/trip/cover/{{$trip->photo}}" alt=""></a></figure>
                                    <div class="details">
                                        <h5 class="box-title"><a href="{{url('home/trip/'.$trip->categories()->first()->url_slug.'/'.$trip->url_slug)}}">{{$trip->title}}</a></h5>
                                        <label class="price-wrapper"><span class="price-per-unit">${{$trip->price}}</span>avg/night</label>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="travelo-box book-with-us-box">
                        <h4>Why Book with us?</h4>
                        <ul>
                            <li>
                                <i class="soap-icon-hotel-1 circle"></i>
                                <h5 class="title"><a href="#">135,00+ Hotels</a></h5>
                                <p>Nunc cursus libero pur congue arut nimspnty.</p>
                            </li>
                            <li>
                                <i class="soap-icon-savings circle"></i>
                                <h5 class="title"><a href="#">Low Rates &amp; Savings</a></h5>
                                <p>Nunc cursus libero pur congue arut nimspnty.</p>
                            </li>
                            <li>
                                <i class="soap-icon-support circle"></i>
                                <h5 class="title"><a href="#">Excellent Support</a></h5>
                                <p>Nunc cursus libero pur congue arut nimspnty.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="travelo-box contact-box">
                        <h4 class="box-title">Need Travelo Help?</h4>
                        <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                        <address class="contact-details">
                            <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                            <br />
                            <a href="#" class="contact-email">help@travelo.com</a>
                        </address>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection

@section('js')

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
        $('.date').datepicker({
            format: 'dd-mm-yyyy'
        });
    </script>

@endsection


