<div id="navigation">
  <ul>
    <li class="first selected"><a href="{{ url('/') }}">Home</a></li>

        <!-- Authentication Links -->
        @if (Auth::guest())

        <li><a href="{{ url('/foremployer') }}">Employers</a></li>
        <li><a href="{{ url('/forhousehelp') }}">Househelp</a></li>
            <li><a href="{{ url('/login') }}">Login</a></li>
        @else
          @if (Auth::user()->role === "Admin")
          <li><a href="{{ url('/admin') }}">Admin</a></li>
          <li><a href="{{ url('/posts') }}">Jobs Posted</a></li>
          <li><a href="{{ url('/cat') }}">Categories</a></li>

          @elseif (Auth::user()->role === "Employer")
          <li><a href="{{ url('/foremployer') }}">For Employers</a></li>
            <li><a href="{{ url('/post') }}">Post Job</a></li>
            <li><a href="{{ url('/applicants') }}">Applicants</a></li>
          @else
          <li><a href="{{ url('/forhousehelp') }}">Househelp</a></li>
            <li><a href="{{ url('/mystars') }}">My Bids</a></li>
          @endif
          <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
        @endif
  </ul>
</div>
<div id="search">
</div>
