<div id="kt_header" style="" class="header align-items-stretch">
<!--begin::Container-->
<div class="container-fluid d-flex align-items-stretch justify-content-between">
    <!--begin::Aside mobile toggle-->
    <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
        <div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
            <i class="bi bi-list fs-1"></i>
        </div>
    </div>
    <!--end::Aside mobile toggle-->
    <!--begin::Mobile logo-->
    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
        <a href="../../demo5/dist/index.html" class="d-lg-none">
            <img alt="Logo" src="{{ asset('logos/logo.png') }}" class="h-45px logo" />
        </a>
    </div>
    <!--end::Mobile logo-->
    <!--begin::Wrapper-->
    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
        <!--begin::Navbar-->
        <div class="d-flex align-items-stretch" id="kt_header_nav">

        </div>
        <!--end::Navbar-->
        <!--begin::Topbar-->
        <div class="d-flex align-items-stretch flex-shrink-0">
            <!--begin::Toolbar wrapper-->
            <div class="topbar d-flex align-items-stretch flex-shrink-0">



                <!--begin::User-->
                <div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px"
                        data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                      <i class="fas text-light  fa-user-circle fa-3x" aria-hidden="true"></i>
                    </div>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <i class="fas fa-cogs fs-2"></i>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bolder d-flex align-items-center fs-5">
                                        {{Auth::user()->name}}

                                    </div>
                                    <a href="#"
                                        class="fw-bold text-muted text-hover-primary fs-7">{{Auth::user()->email}}</a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="#"
                                class="menu-link px-5">Account Setting</a>
                        </div>
                        <!--end::Menu item-->



                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->


                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="menu-link px-5">Sign Out</a>
                        </div>
                        <!--end::Menu item-->


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </div>
                    <!--end::Menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User -->
                <!--begin::Heaeder menu toggle-->
                <div class="d-flex align-items-stretch d-lg-none px-3 me-n3"
                    title="Show header menu">
                    <div class="topbar-item" id="kt_header_menu_mobile_toggle">
                        <i class="bi bi-text-left fs-1"></i>
                    </div>
                </div>
                <!--end::Heaeder menu toggle-->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Container-->
</div>
