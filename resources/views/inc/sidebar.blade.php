<nav class="col-md-2 d-none d-md-block bg-light sidebar">
<div class="sidebar-sticky">
    <ul class="nav flex-column">
        @if(auth::user()->role_id==1 || auth::user()->role_id==3)
            <li class="nav-item">
                <a class="nav-link" href="/home" style="margin-top: 15px;">
                    <span><i class="fa fa-home"></i></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
        @endif
        @if(auth::user()->role_id==1)
            <li class="nav-item">
                <a class="nav-link" href="/user">
                    <span><i class="fa fa-user"></i></span>
                    Users
                </a>
            </li>
        @endif
        
            <li class="nav-item">
                <a class="nav-link" href="/client">
                    <span><i class="fa fa-users"></i></span>
                    Clients
                </a>
            </li>
        @if(auth::user()->role_id==1)
            <li class="nav-item">
                <a class="nav-link" href="/gare">
                    <span><i class="fa fa-building"></i></span>
                    Gares
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/bateau">
                    <span><i class="fa fa-ship"></i></span>
                    Bateaux
                </a>
            </li>
        @endif
        @if(auth::user()->role_id==1 || auth::user()->role_id==3)
            <li class="nav-item">
                <a class="nav-link" href="/passage">
                    <span><i class="fa fa-money-bill"></i></span>
                    Passages
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/operation">
                    <span><i class="fa fa-book"></i></span>
                    Opérations
                </a>
            </li>
        @endif
    </ul>
</div>
</nav>

