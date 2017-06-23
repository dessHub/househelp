@extends('layouts.app')

@section('content')
<div id="contents">
  <div class="background">
    <div id="">
      <div class="section">
        <div class="row">
            <div class="col-md-12">


                <div class="panel panel-default">
                    <div class="panel-heading" style="height:40px;">
                    <div class="col-md-6"></div>
                    <div class="col-md-6"><i class=""></i> </div>
                    </div>
                    <div class="panel-body">
                    You have already applied for this job. Click  <a href="{{ url('forhousehelp')}}"> Here</a> for more job vacancies.
                    </div>

                </div><hr>

            </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- /#contents -->
@endsection
