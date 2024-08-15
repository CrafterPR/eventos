<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
         data-kt-scroll-activate="true" data-kt-scroll-height="auto"
         data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
         data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention px-3 fw-semibold fs-6" id="#kt_app_sidebar_menu"
             data-kt-menu="true" data-kt-menu-expand="false">

            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                   href="{{ route('dashboard') }}">
                    <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </div>

            @canany('view-staff', 'view-roles', 'view-voters')
            <div data-kt-menu-trigger="click"
                 class="menu-item menu-accordion {{ request()->routeIs('users.*') ? 'here show' : '' }}">
                <span class="menu-link">
					<span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
					<span class="menu-title">User Management</span>
					<span class="menu-arrow"></span>
				</span>
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    @can('view-staff')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('users.user.*') ? 'active' : '' }}"
                               href="{{ route('users.user.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Staff Users</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    @can('view-roles')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('users.role.*') ? 'active' : '' }}"
                               href="{{ route('users.role.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Roles</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan

                    <!--end:Menu item-->
                </div>
            </div>
            @endcanany
            @canany('view-voting-periods', 'view-voting-positions', 'view-contestants' , 'view-vote-results')
            <div data-kt-menu-trigger="click"
                 class="menu-item menu-accordion {{ request()->routeIs('vote.*') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <span class="menu-link">
					<span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
					<span class="menu-title">Voting Module</span>
					<span class="menu-arrow"></span>
				</span>
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    @can('view-voting-periods')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('vote.view-periods') ? 'active' : '' }}"
                               href="{{ route('vote.view-periods') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Voting Periods</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    @can('view-voting-positions')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('vote.view-positions.*') ? 'active' : '' }}"
                               href="{{ route('vote.view-positions') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Vote Positions</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan()
                    @can('view-contestants')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('vote.view-contestants.*') ? 'active' : '' }}"
                               href="{{ route('vote.view-contestants') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Vote Contestants</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan()
                    @can('view-voters')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('vote.view-voters.*') ? 'active' : '' }}"
                               href="{{ route('vote.view-voters') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">View Voters</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    <!--end:Menu item-->

                </div>
                <!--end:Menu sub-->
            </div>
            @endcanany



            @can('view-reports')
              <div data-kt-menu-trigger="click"
                   class="menu-item menu-accordion {{ request()->routeIs('reports.*') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <span class="menu-link">
					<span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
					<span class="menu-title">Reports</span>
					<span class="menu-arrow"></span>
				</span>
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('reports.*') ? 'active' : '' }}"
                               href="#">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Exports</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                </div>
                  <!--end:Menu sub-->
              </div>
            @endcan

        </div>
        <!--end:Menu item-->
    </div>
    <!--end::Menu-->
</div>
<!--end::Menu wrapper-->

