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

            @can('user-management')
            <div data-kt-menu-trigger="click"
                 class="menu-item menu-accordion {{ request()->routeIs('users.*') ? 'here show' : '' }}">
                <span class="menu-link">
					<span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
					<span class="menu-title">User Management</span>
					<span class="menu-arrow"></span>
				</span>
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    @can('secretariat')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('users.user.*') ? 'active' : '' }}"
                               href="{{ route('users.user.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">CraftedPR Users</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    @can('view-delegates')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('users.delegates.*') ? 'active' : '' }}"
                               href="{{ route('users.delegates.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Delegates</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    @can('view-exhibitors')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('users.exhibitors.*') ? 'active' : '' }}"
                               href="{{ route('users.exhibitors.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Exhibitors</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan

                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    @can('role-management')
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
                    @can('send-emails')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('users.role.*') ? 'active' : '' }}"
                               href="{{ route('users.send-email') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Send emails</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    <!--end:Menu item-->
                </div>
            </div>
            @endcan
            @can('events-management')
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{ request()->routeIs('events.*') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <span class="menu-link">
					<span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
					<span class="menu-title">Events Module</span>
					<span class="menu-arrow"></span>
				</span>
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('events.manage-events.*') ? 'active' : '' }}"
                               href="{{ route('events.manage-events.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Manage events</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                </div>
                    <!--end:Menu sub-->
            </div>
            @endcan
            @can('ticket-management')
            <div data-kt-menu-trigger="click"
                 class="menu-item menu-accordion {{ request()->routeIs('tickets.*') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <span class="menu-link">
					<span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
					<span class="menu-title">Ticketing Module</span>
					<span class="menu-arrow"></span>
				</span>
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('tickets.manage-tickets.*') ? 'active' : '' }}"
                               href="{{ route('tickets.manage-tickets.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Manage tickets</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                    @can('coupon-management')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('tickets.manage-coupons.*') ? 'active' : '' }}"
                               href="{{ route('tickets.manage-coupons.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Manage Event Coupons</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    @can('view-purchased-tickets')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('tickets.view-purchased') ? 'active' : '' }}"
                               href="{{ route('tickets.view-purchased') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">View Bookings</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan

                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            @endcan
            @can('booths-management')
            <div data-kt-menu-trigger="click"
                 class="menu-item menu-accordion {{ request()->routeIs('booths.*') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <span class="menu-link">
					<span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
					<span class="menu-title">Booths Module</span>
					<span class="menu-arrow"></span>
				</span>
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('booths.booth.index') ? 'active' : '' }}"
                               href="{{ route('booths.booth.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Manage Booths</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    @can('view-booth-bookings')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('booths.view-booth-bookings') ? 'active' : '' }}"
                               href="{{ route('booths.view-booth-bookings') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">View bookings</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan

                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            @endcan
            @can('manage-speakers')
            <div data-kt-menu-trigger="click"
                 class="menu-item menu-accordion {{ request()->routeIs('programme.*') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <span class="menu-link">
					<span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
					<span class="menu-title">Event Programme</span>
					<span class="menu-arrow"></span>
				</span>
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('programme.speakers.index') ? 'active' : '' }}"
                               href="{{ route('programme.speakers.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Manage Speakers</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                    @can('manage-events')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('programme.manage-event') ? 'active' : '' }}"
                               href="{{ route('programme.manage-event') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-line"></span>
							</span>
                                <span class="menu-title">Manage Events</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan

                </div>

                <!--end:Menu sub-->
            </div>
            @endcan

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
                               href="{{ route('reports.index') }}">
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

