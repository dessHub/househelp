@extends('layouts.app')

@section('content')
<div id="contents">
  <div class="background">
    <div id="blogs">
      <div class="sidebar">
        <div class="posts">
          <h3>Quick Links</h3>
          <ul style="color:blue;">
            <li><a href="{{ url('/signE')}}" ><span  style="color:blue;">Register As Employer</span></a></li>
            <li><a href="{{ url('/login')}}"><span  style="color:blue;">login</span> </a></li>
            <li><a href="{{ url('/')}}"><span  style="color:blue;">Home</span> </a></li>
            <li><a href="{{ url('/')}}"><span  style="color:blue;">Our Services</span></a></li>
            <li><a href="{{ url('/')}}"><span  style="color:blue;">About Us</span></a></li>
          </ul>
        </div>
        <div class="archives">
          <h3>Archives</h3>
          <ul>
            <li><a href="">December</a></li>
            <li><a href="">June</a></li>
            <li><a href="">November</a></li>
            <li><a href="">May</a></li>
            <li><a href="">October</a></li>
            <li><a href="">April</a></li>
            <li><a href="">September</a></li>
            <li><a href="">March</a></li>
            <li><a href="">August</a></li>
            <li><a href="">February</a></li>
            <li><a href="">July</a></li>
            <li><a href="">January</a></li>
          </ul>
        </div>
      </div>
      <div class="section">
        <h3><span>Looking for househelp? Just browse through all the availlable househelps</a> and find who you&acute;re looking for.</span></h3>
        <p>You can star on any person you are intested in and we will notify him/her . You can also leave a note for someone you are interested in</p>
        <p>If you're having problems editing this website template, then don't hesitate to ask for help on the <a href="http://www.freewebsitetemplates.com/forum/">Forum</a>.</p>
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
