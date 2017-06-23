@extends('layouts.app')

@section('content')
<div class="container"style="padding-top:20px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Apply for this Job Vacancy</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/star') }}">
                        {{ csrf_field() }}

                       <div class="col-md-12">
                         <div class="col-md-6">
                        <div class="form-group{{ $errors->has('cat') ? ' has-error' : '' }}">
                            <label for="cat" class="col-md-2 control-label">Category:</label>

                            <div class="col-md-12">
                                 <input type"text" class="form-control" id="cat" name="cat" required="true" value="{{ $post->category }}" >
                                 <input id="post_id" type="hidden" class="form-control" name="post_id" value="{{ $post->id}}">
                            </div>
                        </div>
                        </div>

                       <div class="col-md-6">
                        <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                            <label for="salary" class="col-md-2 control-label">Salary:</label>

                            <div class="col-md-12">
                                <input id="salary" type="text" class="form-control" name="salary" value="{{ $post->salary }}" placeholder="">
                                <input id="location" type="hidden" class="form-control" name="location" value="{{Auth::user()->location}}">
                                <input id="h_name" type="hidden" class="form-control" name="h_name" value="{{Auth::user()->name}}">
                                <input id="h_id" type="hidden" class="form-control" name="h_id" value="{{$post->empl_id}}">

                                @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      </div>
                        </div>

                      <div class="col-md-12">
                         <div class="col-md-8">
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Application Note</label>

                                <div class="col-md-12">
                                    <textarea id="description" class="form-control ckeditor" name="description"></textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12" style="padding-top:25px;">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Submit
                                </button>
                            </div>
                        </div>
                      </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
