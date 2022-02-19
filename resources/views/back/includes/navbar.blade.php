<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow bg-primary header-text-dark">
        <div class="app-header__logo">
            <div class="logo-src" style="background: transparent;">
            </div>

            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button"
                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <div class="app-header__content">

            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left  mr-2 header-user-info">
                                {{-- <div class="widget-heading">
                                    <a class="btn btn-info" style="color: white" href="{{ route('main') }}">website </a>
                                </div> --}}

                            </div>
                            <div class="widget-content-left">
                                <div class="btn-group nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle nav-logout" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right navbar-logout" aria-labelledby="navbarDropdown">
                                        <div class="header">
                                       
                                        <h4> {{ Auth::user()->name  }}</h4>
                                    </div>
                                        <hr>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>

                                </div>
                            </div>






                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-main">
