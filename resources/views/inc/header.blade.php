<nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color:#3ca5c5">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img style="height:40px;width: 135px" src="{{asset('images/aqualines.png')}}" class="img-responsive logo"></a>
    
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <form class="form-inline my-2 my-lg-0" method="POST" action="{{route('logout')}}">
                {{ csrf_field() }}
                <button class="btn  my-2 my-sm-0" type="submit" style="background-color:#f3bd4b">Déconnexion</button>
            </form>
        </li>
    </ul>
</nav>