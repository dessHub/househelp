<div id="navigation">
  <ul>
    <li class="first selected"><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('/foremployer') }}">For Employers</a></li>
    <li><a href="{{ url('/login') }}">Services</a></li>
    <li><a href="{{ url('/forhousehelp') }}">Househelp</a></li>

        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else
          @if (Auth::user()->role === "Admin")
          <li><a href="{{ url('/cat') }}">Categories</a></li>
          <li><a href="{{ url('/login') }}">Support</a></li>

          @elseif (Auth::user()->role === "Employer")
            <li><a href="{{ url('/post') }}">Post Job</a></li>
          @else

          @endif
          <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
        @endif
  </ul>
</div>
<div id="search">
  <form action="" method="">
    <input type="text" value="Search" class="txtfield" onblur="javascript:if(this.value==''){this.value=this.defaultValue;}" onfocus="javascript:if(this.value==this.defaultValue){this.value='';}" />
    <input type="submit" value="" class="button" />
  </form>
</div>
