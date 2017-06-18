@extends('layouts.app')

@section('content')
<div id="contents">
  <div class="background">
    <div id="blogs">
      <div class="sidebar">
        <div class="posts">
          <h3>Quick Links</h3>
          <ul style="color:blue;">
          @if(Auth::guest())

            <li><a href="{{ url('/signE')}}" ><span  style="color:blue;">Register As Employer</span></a></li>
            <li><a href="{{ url('/login')}}"><span  style="color:blue;">login</span> </a></li>
          @else
            @if(Auth::user()->role === "Employer")
            <li><a href="{{ url('/post')}}"><span  style="color:blue;">Post Job </span> </a></li>
            <li><a href="{{ url('/')}}"><span  style="color:blue;">Our Services</span></a></li>
            @endif
            <li><a href="{{ url('/logout')}}"><span  style="color:blue;">Logout</span></a></li>
          @endif

            <li><a href="{{ url('/')}}"><span  style="color:blue;">Home</span> </a></li>
            <li><a href="{{ url('/')}}"><span  style="color:blue;">Our Services</span></a></li>
            <li><a href="{{ url('/')}}"><span  style="color:blue;">About Us</span></a></li>
          </ul>
        </div>
      </div>
      <div class="section">
        <h3>Employer Profile</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">

                      <h2><b>Employer Name:</b> {{ $employer->name}}</h2>
                      <h2><b>Employer Id No:</b> {{ $employer->regNo}}</h2>
                      <h2><b>Employer Mobile No:</b> {{ $employer->phoneno}}</h2>
                      <h2><b>Employer Email Address</b> {{ $employer->email}}</h2>
                      <h2><b>Employer Gender:</b> {{ $employer->gender}}</h2>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- /#contents -->
@endsection
