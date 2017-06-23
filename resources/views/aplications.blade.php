@extends('layouts.app')

@section('content')
<div id="contents">
  <div class="background">
    <div id="">
      <div class="">
        <div class="row">
            <div class="col-md-12">
              <h3>Job Applicants</h3>
              @foreach($posts as $key)
                <div class="panel panel-default">
                    <div class="panel-heading" style="height:40px;">
                    <div class="col-md-6">{{ $key->category}}</div>
                    <div class="col-md-6"><i class="fa fa-history"></i> Applied on {{ $key->created_at}}</div>
                    </div>
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-striped">

                            <tbody>
                              <h3><b>Applicant Name: </b> {{ $key->user_name}}</h3>
                              <h3><b>Applicant Mobile No: </b> {{ $key->phoneno}}</h3>
                            <h4><b>Application message. </b>{{ $key->star}}</h4>
                            </tbody>
                        </table>
                      </div>
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
