@extends('layouts.app')

@section('content')
<div class="container"style="padding-top:20px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Post Job Vacancy</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/post') }}">
                        {{ csrf_field() }}

                       <div class="col-md-6">
                        <div class="form-group{{ $errors->has('cat') ? ' has-error' : '' }}">
                            <label for="cat" class="col-md-2 control-label">Category:</label>

                            <div class="col-md-12">
                                 <select class="form-control" id="cat" name="cat" required="true" value="{{ old('cat') }}" style="background-color : inherit">
                                     <option  value="">Select Category</option>
                                     @foreach($cats as $key)
                                     <option  value="{{ $key->name}}">{{ $key->name}}</option>
                                     @endforeach

                                 </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                            <label for="salary" class="col-md-2 control-label">Salary:</label>

                            <div class="col-md-12">
                                <input id="salary" type="text" class="form-control" name="salary" value="{{ old('salary') }}" placeholder="In Ksh">
                                <input id="location" type="hidden" class="form-control" name="location" value="{{Auth::user()->location}}">
                                <input id="empl_name" type="hidden" class="form-control" name="empl_name" value="{{Auth::user()->name}}">
                                <input id="empl_id" type="hidden" class="form-control" name="empl_id" value="{{Auth::user()->id}}">

                                @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      </div>

                      <div class="col-md-6">

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Job Description</label>

                                <div class="col-md-12">
                                    <textarea id="description" class="form-control ckeditor" name="description"></textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group">
                            <div class="col-md-12" style="padding-top:25px;">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Post
                                </button>
                            </div>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container"style="">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Post Job Vacancy</div>
                <div class="panel-body">
                  <div class="table-full-width">
                      <table class="table">
                          <tbody>
                            @foreach($posts as $key)
                              <tr>

                                  <td>{{ $key->category}}</td>
                                  <td>{{ $key->salary}}</td>
                                  <td>{{ $key->description}}</td>
                                  <td class="td-actions text-right">
                                  <div class="stats">
                                      <i class="fa fa-history"></i> Posted On {{ $key->created_at}}
                                  </div>
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
