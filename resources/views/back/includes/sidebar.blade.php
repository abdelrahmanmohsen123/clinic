<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
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
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboard</li>
                <li>
                    <a href="{{ route('dashboard.index') }}" class=" {{ (request()->is('*dashboard/home')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">Components</li>


                <li>
                    <a class="{{ (request()->is('*dashboard/schedule*')) ? 'mm-active' : '' }}" href="{{ route('schedule.index') }}">
                        <i class="metismenu-icon pe-7s-display1"></i>
                            schedules 
                    </a>
                </li>
                <li>
                    <a class="{{ (request()->is('*dashboard/assessment*')) ? 'mm-active' : '' }}" href="{{ route('assessment.index') }}">
                        <i class="metismenu-icon pe-7s-display1"></i>
                            assessments 
                    </a>
                </li>
                <li>
                    <a class="{{ (request()->is('*dashboard/visit*')) ? 'mm-active' : '' }}" href="{{ route('visit.index') }}">
                        <i class="metismenu-icon pe-7s-display1"></i>
                            Visit Informations 
                    </a>
                </li>
                <li>
                    <a class="{{ (request()->is('*dashboard/procedure*')) ? 'mm-active' : '' }}" href="{{ route('procedure.index') }}">
                        <i class="metismenu-icon pe-7s-display1"></i>
                            procedures 
                    </a>
                </li>
                <li>
                    <a class="{{ (request()->is('*dashboard/bill*')) ? 'mm-active' : '' }}" href="{{ route('bill.index') }}">
                        <i class="metismenu-icon pe-7s-display1"></i>
                            bills 
                    </a>
                </li>
                    
              




            </ul>
        </div>
    </div>
</div>

<div class="app-main__outer">

