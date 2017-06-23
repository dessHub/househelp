@extends('layouts.app')

@section('content')


<div class="container"style="">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Job Vacancy</div>
                <div class="panel-body">
                  <div class="table-full-width">
                      <table class="table">
                          <tbody>
                            @foreach($posts as $key)
                              <tr>

                                  <td>{{ $key->category}}</td>
                                  <td>{{ $key->salary}}</td>
                                  <td>{{ $key->description}}</td>
                                  <td>{{ $key->status}}</td>
                                  <td>{{ $key->validity}}</td>
                                  <td class="td-actions text-right">
                                  <div class="stats">
                                      <i class="fa fa-history"></i> Posted On {{ $key->created_at}}
                                  </div>
                                  </td>
                                    <td>
                                    @if(Auth::user()->role === "Admin")
                                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/validity') }}">
                                                {{ csrf_field() }}
                                                <input class="form-control" type="hidden" name="post_id" id="post_id" value="{{ $key->id}}"/>
                                                <input class="form-control" type="hidden" name="valid" id="valid" value="{{ $key->validity}}"/>

                                                @if($key->validity === "Unverified")
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-tick"></i> Verify
                                                </button>
                                                 @elseif($key->validity === "Verified")
                                                @else
                                                <div>Closed</div>

                                                 @endif

                                                </form>
                                    @elseif(Auth::user()->role === "Househelp")
                                      <div class="col-md-2"><a href="{{ url('/bid'.$key->id)}}">Apply</a></div>

                                    @endif
                                          </td>

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
@endsection
