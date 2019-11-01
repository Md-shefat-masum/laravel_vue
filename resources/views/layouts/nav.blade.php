<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="nav-devider"></li>
        <li class="nav-small-cap">MAIN NAVIGATION</li>
        <li class="nav-devider"></li>

        <li> <a href="{{url('admin')}}">
            <i class="mdi mdi-camera-timer"></i>
            <span class="hide-menu">Dashboard </span>
            </a>
        </li>

        <li>
            <a href="{{url('admin/message')}}">
                <i class="mdi mdi-comment-multiple-outline"></i>
                <span class="hide-menu">Message</span>
            </a>
        </li>

        @if (Auth::user()->role_serial == 1)
            <li>
                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                    <i class="mdi mdi-account-settings-variant"></i>
                    <span class="hide-menu">Admin Management</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{url('admin/user')}}"><i class="ti ti-user"></i> All User </a></li>
                    <li><a href="{{route('user_role_index')}}"><i class="ti ti-direction-alt"></i> User Role </a></li>
                </ul>
            </li>
        @endif

        <li>
            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                <i class="mdi mdi-cube-outline"></i>
                <span class="hide-menu">Basic Informations</span>
            </a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="#">Website Logo</a></li>
                <li><a href="#">Address</a></li>
                <li><a href="#">Copy right</a></li>
                <li><a href="{{route('social_link')}}">social links</a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                <i class="ti ti-image"></i>
                <span class="hide-menu">Gallery</span>
            </a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="#">Photo Gallery </a></li>
                <li><a href="#">Video Gallery </a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                <i class="mdi mdi-json"></i>
                <span class="hide-menu">Ajax</span>
            </a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{route('ajax_index')}}">Home</a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                <i class="icon icon-docs"></i>
                <span class="hide-menu">Admin page templates</span>
            </a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{route('blank_page_index')}}">index</a></li>
                <li><a href="{{route('blank_page_add')}}">add</a></li>
                <li><a href="{{route('blank_page_view')}}">view</a></li>
                <li><a href="{{route('blank_page_all_in_one')}}">all in one</a></li>
                <li><a href="{{route('blank_page_test')}}">ck editor</a></li>
            </ul>
        </li>

        <li class="nav-devider mt-5"></li>
        <li>
            <a href="{{url('/')}}" target="_blank">
                <i class="ti icon-globe"></i>
                <span class="hide-menu">Visit Site</span>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i>
                <span class="hide-menu">Logout </span>
            </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</nav>
