@extends('layouts.app')

@section('content')
<div class="center_box cb">
    <div class="uo_tabs cf">
        <a href="#"><span>profile</a>
        <a href="#"><span>Reviews</span></a>
        <a href="#"><span>orders</span></a>
        <a href="#" class="active"><span>My Address</span></a>
        <a href="#"><span>Settings</span></a>
    </div>
    <div class="page_content bg_gray">
        <div class="uo_header">
            <div class="wrapper cf">
                <div class="wbox ava">
                    <figure><img src="imgc/user_ava_1_140.jpg" alt="Helena Afrassiabi" /></figure>
                </div>
                <div class="main_info">
                    <h1>Helena Afrassiabi</h1>
                    <div class="midbox">
                        <h4>560 points</h4>
                        <div class="info_nav">
                            <a href="#">Get Free Points</a>
                            <span class="sepor"></span>
                            <a href="#">Win iPad</a>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="item">
                            <div class="num">30</div>
                            <div class="title">total orders</div>
                        </div>
                        <div class="item">
                            <div class="num">14</div>
                            <div class="title">total reviews</div>
                        </div>
                        <div class="item">
                            <div class="num">0</div>
                            <div class="title">total gifts</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uo_body">
            <div class="wrapper">
                <div class="uofb cf">
                    <div class="l_col adrs">
                        <h2>Add New Address</h2>

                        <form action="{{ route('address.store') }}" method="post" id="address-form">
                            {{ csrf_field() }}
                            <div class="field">
                                <label>Name *</label>
                                <input type="text" name="name" palceholder="" class="vl_empty" required>
                              </div>
                            <div class="field">
                                <label>Your city *</label>
                                <select id="city" name="city" class="vl_empty" required>
                                    <option class="plh"></option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->name }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <label>Your area *</label>
                                <select id="areas" name="area" required>
                                    <option class="plh">Select City</option>
                                </select>
                            </div>

                            <div class="field">
                                <label>Street</label>
                                <input type="text" name="street" value="" palceholder="" class="vl_empty" />
                            </div>
                            <div class="field">
                                <label>House # </label>
                                <input type="text" name="house" value="" palceholder="House Name / Number" />
                            </div>

                            <div class="field">
                                <label class="pos_top">Additional information</label>
                                <textarea id="description" name="description" value=""></textarea>
                            </div>

                            <div class="field">
                                <input type="submit" value="add address" class="green_btn" id="getAddress"/>
                            </div>
                        </form>
                        <div class="alert">
                            <p style="color: red; font-size: 24px" id="msg"></p>
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="color: red; font-size: 24px;">*{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('status'))
                            <p style="color:#000; font-size: 24px">{{ session('status') }}</p>
                        @endif


                    </div>

                    <div class="r_col">
                        <h2>My Addresses</h2>

                        <div class="uo_adr_list">
                            @if(isset($addresses))
                                @foreach($addresses as $address)
                                    <div class="item">
                                        <h3>{{ $address->name }}</h3>
                                        <p>

                                            {{ $address->city . ', '}} {{ $address->street ? $address->area . ', ' : $address->area }}
                                            {{ $address->street ?  $address->street . ', ' : '' }} {{ $address->house ? $address->house . '. ' : '' }}
                                        </p>
                                        <p>
                                            {{ $address->description  }}
                                        </p>
                                        <div class="actbox">
                                          
                                            <form action="{{ route('address.destroy', $address->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <input style="border: none" value="" onclick="return confirm('Delete?')" type="submit" class="bcross">
                                            </form>
                                        </div>
                                    </div>
                                @endforeach

                            @endif
                            {{--<div class="item">
                                <h3>HOME Address</h3>
                                <p>Dubai, Business Bay Area, Sheikh Zayed Road, Single </p>
                                <div class="actbox">
                                    <a href="#" class="bcross"></a>
                                </div>
                            </div>
                            <div class="item">
                                <h3>Work Address</h3>
                                <p>Dubai, Business Bay Area, Sheikh Zayed Road, Single<br/>Business Tower, Suite 2204</p>
                                <div class="actbox">
                                    <a href="#" class="bcross"></a>
                                </div>
                            </div>--}}
                            @if(session('success'))
                                <p style="color: red; font-size: 24px">{{ session('success') }}</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection