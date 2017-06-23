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
            @if(Auth::user()->role === "Admin")
            <li><a href="{{ url('/posts')}}"><span  style="color:blue;">Job Posts </span> </a></li>
            <li><a href="{{ url('/hHelps')}}"><span  style="color:blue;">House Helps</span></a></li>
            @endif
            <li><a href="{{ url('/logout')}}"><span  style="color:blue;">Logout</span> </a></li>
          @endif

            <li><a href="{{ url('/')}}"><span  style="color:blue;">Home</span> </a></li>
            <li><a href="{{ url('/')}}"><span  style="color:blue;">Our Services</span></a></li>
            <li><a href="{{ url('/')}}"><span  style="color:blue;">About Us</span></a></li>
          </ul>
        </div>
      </div>
      <div class="section">
        <h3><span>Looking for househelp? Just browse through all the availlable househelps</a> and find who you&acute;re looking for.</span></h3>
        <p>You can star on any person you are intested in and we will notify him/her . You can also leave a note for someone you are interested in</p>
        <p>If you're having problems using this website, then don't hesitate to ask for help through our help lines.</p>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-striped">

                            <thead>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile No</th>
                                <th>Location</th>

                            </thead>
                            <tbody>
                              @foreach($users as $key)
                                <tr>
                                  <td>{{ $key->id }}</td>
                                  <td>{{ $key->category}}</td>
                                  <td>{{ $key->name }}</td>
                                  <td>{{ $key->email }}</td>
                                  <td>{{ $key->phoneno}}</td>
                                  <td>{{ $key->location }}</td>
                                  <td><a href="{{url('del'.$key->id)}}">Remove</a></td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
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
