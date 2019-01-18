<header class="l-header l-header-admin js-header">
    <div class="l-header-top u-clear">
        <div class="l-header-logo">
            <a class="logo " href="./">
                <img src="{{url('/')}}/images/logo-admin.png" width="138" height="28" alt="BLOG" />
            </a>
        </div>
        <div class="l-header-text">
            <p>
            ADMIN PAGE
            @if (Auth::check())
                [<a href="{{ url('/admin/logout') }}">Logout</a>]
            @endif
            </p>
        </div>
    </div>
</header>