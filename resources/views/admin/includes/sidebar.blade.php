<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar doc-sidebar">
    <div class="app-sidebar__user clearfix">
        <div class="dropdown user-pro-body">
            <div>
                <img src="{{ asset('assets/images/users/male/25.jpg') }}" alt="user-img" class="avatar avatar-lg brround">
                <a href="editprofile.html" class="profile-img">
                    <span class="fa fa-pencil" aria-hidden="true"></span>
                </a>
            </div>
            <div class="user-info">
                <h2 class="text-capitalize">{{ auth()->user()->name }}</h2>
                {{-- <span>{{ auth()->user()->roles->first()->name}}</span> --}}
            </div>
        </div>
    </div>
    <ul class="side-menu">
        <li class="slide">
            <a class="side-menu__item"  href="{{ route('home') }}"><i
                    class="side-menu__icon fa fa-tachometer"></i><span class="side-menu__label">Dashboard</span></a>

        </li>
        <li class="slide">
            <a class="side-menu__item"  href="{{ route('category.index') }}"><i
                    class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Category</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item"  href="{{ route('service.index') }}"><i
                    class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Service</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item"  href="{{ route('speciality.index') }}"><i
                    class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Speciality </span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item"  href="{{ route('user.index') }}"><i
                    class="side-menu__icon fa fa-user"></i><span class="side-menu__label">User </span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i
                    class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Auth </span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{route('roles.index')}}">Roles</a></li>
                <li><a class="slide-item" href="{{route('permissions.index')}}">Permissions</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item"  href="{{ route('admin.provider.index') }}"><i
                    class="side-menu__icon fa fa-handshake-o"></i><span class="side-menu__label">Providers </span></a>
        </li>



        <div class="app-sidebar-footer">
            <a href="emailservices.html">
                <span class="fa fa-envelope" aria-hidden="true"></span>
            </a>
            <a href="profile.html">
                <span class="fa fa-user" aria-hidden="true"></span>
            </a>
            <a href="editprofile.html">
                <span class="fa fa-cog" aria-hidden="true"></span>
            </a>
            <a href="login.html">
                <span class="fa fa-sign-in" aria-hidden="true"></span>
            </a>
            <a href="chat.html">
                <span class="fa fa-comment" aria-hidden="true"></span>
            </a>
        </div>
</aside>
