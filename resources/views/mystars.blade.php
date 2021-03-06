@extends('layouts.app')

@section('content')
<div id="contents">
  <div class="background">
    <div id="">
      <div class="">
        <div class="row">
            <div class="col-md-12">
              <h3>Jobs Im Interested In</h3>
              @foreach($posts as $key)
                <div class="panel panel-default">
                    <div class="panel-heading" style="height:40px;">
                    <div class="col-md-6">{{ $key->category}}</div>
                    <div class="col-md-6"><i class="fa fa-history"></i> Appliedm on {{ $key->created_at}}</div>
                    </div>
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-striped">

                            <tbody>
                            <p>{{ $key->star}}</p>
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
