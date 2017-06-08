@extends('layouts.app')

@section('content')
<div class="container"style="padding-top:20px; background:inherit">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                       <div class="col-md-9">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Name</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      </div>

                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('phoneNo') ? ' has-error' : '' }}">
                            <label for="phoneNo" class="col-md-4 control-label">Mobile No:</label>

                            <div class="col-md-9">
                                <input id="phoneNo" type="text" class="form-control" name="phoneNo" value="{{ old('phoneNo') }}">

                                @if ($errors->has('phoneNo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phoneNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                          <label for="gender" class="col-md-4 control-label">Gender:</label>

                          <div class="col-md-9">
                               <select class="form-control" id="gender" name="gender" required="true" value="{{ old('gender') }}" style="background-color : inherit">
                                   <option  value="">Select Gender</option>
                                   <option  value="Male">Male</option>
                                    <option  value="Female">Female</option>

                               </select>
                          </div>
                      </div>

                  <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                      <label for="cat" class="col-md-4 control-label">Category:</label>

                      <div class="col-md-9">
                           <select class="form-control" id="category" name="category" required="true" value="{{ old('category') }}" style="background-color : inherit">
                               <option  value="">Select Category</option>
                                 @foreach($cats as $key)
                                <option  value="{{ $key->name }}">{{ $key->name }}</option>
                                @endforeach

                           </select>
                      </div>
                  </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          </div>

                          <div class="col-md-6">

                          <div class="form-group{{ $errors->has('regNo') ? ' has-error' : '' }}">
                              <label for="regNo" class="col-md-4 control-label">Registration No:</label>

                              <div class="col-md-9">
                                  <input id="regNo" type="text" class="form-control" name="regNo" value="{{ old('regNo') }}">
                                  <input id="role" type="hidden" class="form-control" name="role" value="Househelp">

                                  @if ($errors->has('regNo'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('regNo') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                              <div class="col-md-9">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                              <label for="location" class="col-md-4 control-label">Location</label>

                              <div class="col-md-9">
                                  <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}">

                                  @if ($errors->has('location'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('location') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>


                          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                              <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                              <div class="col-md-9">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                  @if ($errors->has('password_confirmation'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
