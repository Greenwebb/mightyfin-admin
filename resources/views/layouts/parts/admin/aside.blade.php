<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Aside Toolbarl-->
    <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
        <!--begin::Aside user-->
        <!--begin::User-->
        <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
            <!--begin::Symbol-->
            <div class="symbol symbol-50px">

                @if (auth()->user()->profile_photo_path)
                    @if ($route == 'edit-user' || $route == 'profile.show' || $route == 'loan-details' || $route == 'detailed' || $route == 'loan-statement')
                    <img src="{{ '../public/'.Storage::url(auth()->user()->profile_photo_path) }}" alt=""/>
                    @else
                    <img src="{{ 'public/'.Storage::url(auth()->user()->profile_photo_path) }}" alt=""/>
                    @endif
                @else
                    <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg" alt=""/>
                @endif
            </div>
            <!--end::Symbol-->
            <!--begin::Wrapper-->
            <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
                <!--begin::Section-->
                <div class="d-flex">
                    <!--begin::Info-->
                    <div class="flex-grow-1 me-2">
                        <!--begin::Username-->
                        <a href="#" class="text-white text-hover-primary fs-6 fw-bold">
                            {{ auth()->user()->fname.' '.auth()->user()->lname }}
                        </a>
                        <!--end::Username-->
                        <!--begin::Description-->
                        <span class="text-warning fw-semibold d-block fs-8 mb-1">
                            {{ preg_replace('/[^A-Za-z0-9. -]/', '',  Auth::user()->roles->pluck('name')) ?? 'Guest' }}
                        </span>
                        <!--end::Description-->
                        <!--begin::Label-->
                        <div class="d-flex align-items-center text-success fs-9">
                            <span class="bullet capitalize bullet-dot bg-success me-1"></span>online
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Info-->
                    <!--begin::User menu-->
                    <div class="me-n2">
                        <!--begin::Action-->
                        <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            data-kt-menu-overflow="true">
                            <i class="ki-duotone ki-setting-2 text-muted fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </a>
                        <!--begin::User account menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="{{ asset('public/mfs/admin/assets/media/avatars/blank.png')}}" />
                                    </div>

                                    <div class="d-flex flex-column">
                                        <div class="fw-bold d-flex align-items-center fs-5">
                                            {{ auth()->user()->fname.' '.auth()->user()->lname }}
                                            <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">
                                                {{ preg_replace('/[^A-Za-z0-9. -]/', '',  Auth::user()->roles->pluck('name')) ?? 'Staff' }}
                                            </span>
                                        </div>
                                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="separator my-2"></div>

                            <div class="menu-item px-5">
                                <a href="{{ route('my-profile', ['view' => 'profile']) }}" class="menu-link px-5">My Profile</a>
                            </div>

                            <div class="menu-item px-5">
                                <a href="{{ route('sys-settings') }}" class="menu-link px-5">
                                    <span class="menu-text">System Settings</span>
                                    <span class="menu-badge">
                                        <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                                    </span>
                                </a>
                            </div>

                            <div class="separator my-2"></div>

                            <form method="POST" action="{{ route('logout') }}" class="menu-item px-5">
                                @csrf
                                <button type="submit" class="menu-link px-5 btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z"/>
                                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                                    </svg>
                                    <span class="ms-2">Sign Out </span>
                                </button>
                            </form>
                            <!--end::Menu item-->
                        </div>
                        <!--end::User account menu-->
                        <!--end::Action-->
                    </div>
                    <!--end::User menu-->
                </div>
                <!--end::Section-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::User-->
        <!--begin::Aside search-->
        <div class="aside-search py-5">
            <!--begin::Search-->
            <div id="kt_header_search" class="header-search d-flex align-items-center w-100"
                data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter"
                data-kt-search-layout="menu" data-kt-search-responsive="false" data-kt-menu-trigger="auto"
                data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
                <!--begin::Tablet and mobile search toggle-->
                <div data-kt-search-element="toggle" class="search-toggle-mobile d-flex d-lg-none align-items-center">
                    <div class="d-flex">
                        <i class="ki-duotone ki-magnifier fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>

                <form data-kt-search-element="form" class="w-100 position-relative" autocomplete="off">
                    <input type="hidden" />
                    <i
                        class="ki-duotone ki-magnifier fs-2 search-icon position-absolute top-50 translate-middle-y ms-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>

                    <input type="text" class="search-input form-control ps-13 fs-7 h-40px" name="search"
                        placeholder="Quick Search" value="Search" data-kt-search-element="input" />

                    <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                        data-kt-search-element="spinner">
                        <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                    </span>

                    <span
                        class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4"
                        data-kt-search-element="clear">
                        <i class="ki-duotone ki-cross fs-2 fs-lg-1 me-0">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                </form>
            </div>
        </div>

    </div>

    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y mx-3 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
            data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <a href="{{ route('dashboard') }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </span>
                    </a>
                </div>

                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">MODULES</span>
                    </div>
                </div>

                @can('view clientele')
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-address-book fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                        <span class="menu-title">Clientele</span>
                        <span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">
                        @can('view clientele')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('borrowers') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Manage Borrowers</span>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>
                @endcan


                @can('view loans')
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-element-plus fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </span>
                        <span class="menu-title">Loans</span>
                        <span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('view-loan-requests') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="text-warning menu-title">Loan Requests</span>
                            </a>
                        </div>
                        @endcan

                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('approved-loans') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Open Loans</span>
                            </a>
                        </div>
                        @endcan

                        @can('view closed')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('closed-loans') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Closed Loans</span>
                            </a>
                        </div>
                        @endcan
                        {{-- @can('create loan') --}}
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('proxy-loan-create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>

                                <span class="menu-title">Add Loan</span>
                            </a>
                        </div>
                        {{-- @endcan --}}
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('due-loans') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Due Loans</span>
                            </a>
                        </div>
                        @endcan
{{--
                        @can('view pending repayments')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('repayments') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pending Repayments</span>
                            </a>
                        </div>
                        @endcan --}}
                        @can('view missed repayments')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('missed-repayments') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Missed Repayments</span>
                            </a>
                        </div>
                        @endcan
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('loan-arrears') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Loans in Arrears</span>
                            </a>
                        </div>
                        @endcan
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('no-repayments') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">No Repayments</span>
                            </a>
                        </div>
                        @endcan
                        @can('view past maturity')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('past-maturity-date') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Past Maturity Date</span>
                            </a>
                        </div>
                        @endcan
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('principal-outstanding') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Principal Outstanding</span>
                            </a>
                        </div>
                        @endcan
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('one-month-late') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">1 Month Late Loans</span>
                            </a>
                        </div>
                        @endcan
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('three-month-late') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">3 Months Late Loans</span>
                            </a>
                        </div>
                        @endcan
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('loan-calculator') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Loan Calculator</span>
                            </a>
                        </div>
                        @endcan
                        @can('view pending')
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('guarantors') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Guarantors</span>
                            </a>
                        </div>
                        @endcan
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('loans') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">View all Loans</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endcan

                @can('view operations')
                    <div class="menu-item pt-5">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">Operations & Staff</span>
                        </div>
                    </div>
                    @can('view clientele')
                    {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-address-book fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                            <span class="menu-title">HRM</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion">
                            @can('view employees')
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('hrm.dashboard') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </div>
                            @endcan
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('hrm.staff') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Staff</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('hrm.payroll') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Payroll</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('insurance') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Insurance</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('contracts') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Contracts</span>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    @endcan
                    @can('view employees')
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-abstract-28 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Employees</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion">
                            <div  class="menu-item menu-accordion mb-1">
                                <a class="menu-link" href="{{ route('employees') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">All Staff</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endcan

                    @can('view accounting')
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-abstract-28 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Accounting</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion">
                            @can('view transactions')
                            <div class="menu-item menu-accordion mb-1">
                                <a href="{{ route('make-payment') }}" class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Payment Transactions</span>
                                </a>
                            </div>
                            @endcan

                            @can('manage funds')
                            {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Manage Funds</span>
                                </span>
                            </div> --}}
                            @endcan
                        </div>
                    </div>
                    @endcan

                    @can('view reports')
                    {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-abstract-28 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Reports</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion">
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                                <span class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Loan Report</span>
                                </span>

                            </div>
                        </div>
                    </div> --}}
                    @endcan
                @endcan


                @can('system settings')
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Settings</span>
                    </div>
                    <!--end:Menu content-->
                </div>

                @can('see the list of users')
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-abstract-28 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">User Management</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Users</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('users') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">All Users</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                {{-- <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="#">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Blocked Users</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div> --}}
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <a href="{{ route('roles') }}" class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Roles & Permissions</span>
                            </a>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->

                            <!--end:Menu sub-->
                        </div> --}}
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                @endcan
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{ route('sys-settings') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-abstract-26 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">System Settings</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                @endcan

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>

</div>
