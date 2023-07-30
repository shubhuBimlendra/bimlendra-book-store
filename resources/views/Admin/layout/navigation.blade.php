<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{route('admin.dashboard')}}"><img src="images/logo.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{route('admin.dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Home</a>
                    </li>
                    <li class="active">
                        <a href="{{route('categories.index')}}"> <i class="menu-icon fa fa-table"></i>Manage Category </a>
                    </li>

                    <li class="active">
                        <a href="{{route('authors.index')}}"> <i class="menu-icon fa fa-table"></i>Manage Author </a>
                    </li>

                    <li class="active">
                        <a href="{{route('books.index')}}"> <i class="menu-icon fa fa-table"></i>Manage Books </a>
                    </li>

                    <li class="active">
                        <a class="" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="menu-icon fa fa-sign-in"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
