<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="{{ route('home') }}">
                    <i class="icon_building_alt"></i>
                    <span>Company</span>
                </a>
            </li>
            <li class="sub-menu">
                <a class="" href="{{ route('notificationForm') }}">
                    <i class="icon_mobile"></i>
                    <span>Notifications</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_flowchart_alt"></i>
                    <span>Subsidiaries</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('subsidiaries') }}">List</a></li>
                    <li><a class="" href="{{ route('newSubsidiary') }}">New</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_gift_alt"></i>
                    <span>Products</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('products') }}">List</a></li>
                    <li><a class="" href="{{ route('newProduct') }}">New</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_datareport_alt"></i>
                    <span>Services</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('services') }}">List</a></li>
                    <li><a class="" href="{{ route('newService') }}">New</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_easel_alt"></i>
                    <span>Projects</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('projects') }}">List</a></li>
                    <li><a class="" href="{{ route('newProject') }}">New</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_group"></i>
                    <span>Clients</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('clients') }}">List</a></li>
                    <li><a class="" href="{{ route('newClient') }}">New</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="social_rss"></i>
                    <span>News</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('news') }}">List</a></li>
                    <li><a class="" href="{{ route('newNews') }}">New</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="social_share"></i>
                    <span>Social Networks</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('socials') }}">List</a></li>
                    <li><a class="" href="{{ route('newSocial') }}">New</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_mail_alt"></i>
                    <span>Messages</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('messages') }}">List</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_images"></i>
                    <span>Gallery</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('galleries') }}">List</a></li>
                    <li><a class="" href="{{ route('newGallery') }}">New</a></li>
                </ul>
            </li>



            @if(\Illuminate\Support\Facades\Auth::user()->role < 3)
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_contacts_alt"></i>
                    <span>Users</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('users') }}">List</a></li>
                    <li><a class="" href="{{ route('newUser') }}">New</a></li>
                </ul>
            </li>
            @endif
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>