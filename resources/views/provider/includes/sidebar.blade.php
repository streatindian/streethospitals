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
            <a class="side-menu__item"  href="{{ route('provider.dashboard') }}"><i
                    class="side-menu__icon fa fa-tachometer"></i><span class="side-menu__label">Dashboard</span></a>

        </li>
        <li class="slide">
            <a class="side-menu__item"  href="#"><i
                    class="side-menu__icon fa fa-building"></i><span class="side-menu__label">My Listing</span></a>

        </li>
        


        {{-- <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Admin
                                settings</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="admin-pricing.html">Admin Pricing</a></li>
                            <li><a class="slide-item" href="Ads.html">Ads List</a></li>
                            <li><a class="slide-item" href="comments.html">Comments</a></li>
                            <li><a class="slide-item" href="email-users.html">Email-Users</a></li>
                            <li><a class="slide-item" href="media-gallery.html">Media Gallery</a></li>
                            <li><a class="slide-item" href="newad.html">New Ad</a></li>
                            <li><a class="slide-item" href="newuser.html">New User</a></li>
                            <li><a class="slide-item" href="favourite-ads.html">Favourite-Ads</a></li>
                            <li><a class="slide-item" href="payment-orders.html">Payment Orders</a></li>
                            <li><a class="slide-item" href="payments-adpacks.html">Payment Adpacks</a></li>
                            <li><a class="slide-item" href="payment-settings.html">Payment Settings</a></li>
                            <li><a class="slide-item" href="payments-membership.html">Payment Membership</a></li>
                            <li><a class="slide-item" href="profile-admin.html">Profile Admin</a></li>
                            <li><a class="slide-item" href="settings.html">Settings</a></li>
                            <li><a class="slide-item" href="users-all.html">All Users</a></li>
                        </ul>
                    </li> --}}

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
