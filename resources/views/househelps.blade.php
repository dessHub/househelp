@extends('layouts.app')

@section('content')
<div id="contents">
  <div class="background">
    <div id="blogs">
      <div class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Registered Users</div>
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
                                  <td><a href="url('user'.$key->id)">View</a></td>

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
