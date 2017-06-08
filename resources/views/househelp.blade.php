@extends('layouts.app')

@section('content')
<div id="contents">
  <div class="background">
    <div id="blogs">
      <div class="sidebar">
        <div class="posts">
          <h3>Quick Links</h3>
          <ul style="color:blue;">
            <li><a href="{{ url('/signup')}}" ><span  style="color:blue;">Register As Househelp</span></a></li>
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
        <h3><span>Looking for househelp work? Just browse through all our availlable Job vacancies</a> and find what you&acute;re looking for.</span></h3>
        <p>You can star on any vacancy you are intested in and we will notify the employer . </p>
        <p>If you're having problems editing this website template, then don't hesitate to ask for help on the <a href="http://www.freewebsitetemplates.com/forum/">Forum</a>.</p>
        <div class="row">
            <div class="col-md-12">
              <h3>Open Vacancies</h3>
              @foreach($posts as $key)
                <div class="panel panel-default">
                    <div class="panel-heading" style="height:40px;">
                    <div class="col-md-6">{{ $key->category}}</div>
                    <div class="col-md-6"><i class="fa fa-history"></i> Posted On {{ $key->created_at}}</div>
                    </div>
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-striped">

                            <tbody>
                            <p>{{ $key->description}}</p>
                            </tbody>
                        </table>
                      </div>
                    </div>
                        <div class="panel-footer" style="height:40px;">
                        <div class="col-md-8"><b>Location:</b> {{ $key->location}}</div>
                        <div class="col-md-4"><b>Salary:</b> Ksh.{{ $key->salary}}</div>
                        </div>

                </div><hr>
                @endforeach
            </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- /#contents -->
@endsection
