<a href="{{ URL::route('admin.home') }}" class="logo">
	<!-- Add the class icon to your logo image or logo icon to add the margining -->
	{{ $main_title }}
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">

    <!-- Sidebar toggle button-->
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-right">

        <ul class="nav navbar-nav">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li class="dropdown messages-menu">
                <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                    {{{ $properties['native'] }}}
                </a>
            </li>
            @endforeach
        </ul>

        <ul class="nav navbar-nav">
            <li>
                <a href="{{ URL::route('admin.logout') }}"  style="display: inline-block">
                    <i class="fa fa-sign-out"></i>
                    {{ ucfirst(Lang::trans('admin::general.logout')) }}
                </a>
            </li>
        </ul>

    </div>
</nav>