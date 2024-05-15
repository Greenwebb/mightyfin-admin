<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Navbar-->
            <div class="card mb-6">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <!--begin: Pic-->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                @if ($loan->user->profile_photo_path)
                                    <img src="{{ '../public/'.Storage::url($loan->user->profile_photo_path) }}" alt="image" />
                                @else
                                    <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg" alt="image"/>
                                @endif
                                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $loan->user->fname.' '.$loan->user->lname }}</a>
                                        <a href="#">
                                            <i class="ki-duotone ki-verify fs-1 text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex gap-4 flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                        @if($loan->user->nrc_no)
                                        <a href="#" class="d-flex align-items-center text-primary text-hover-primary me-5 mb-2">
                                            {{ $loan->user->id_type ?? 'NRC: '}}
                                            {{ $loan->user->nrc_no ?? $loan->user->nrc}}</a>
                                        @endif

                                        @if($loan->user->occupation)
                                        <a href="#" class="d-flex align-items-center text-primary text-hover-primary me-5 mb-2">
                                            {{ $loan->user->occupation }}</a>
                                        @endif

                                        @if($loan->user->jobTitle)
                                        <a href="#" class="d-flex align-items-center text-primary text-hover-primary me-5 mb-2">
                                            {{ $loan->user->jobTitle }}</a>
                                        @endif

                                        @if($loan->user->address)
                                        <a href="#" class="d-flex align-items-center text-primary text-hover-primary me-5 mb-2">
                                            {{ $loan->user->address }}</a>
                                        @endif

                                        @if($loan->user->email)
                                        <a href="#" class="d-flex align-items-center text-primary text-hover-primary mb-2">
                                            {{ $loan->user->email }}</a>
                                        @endif

                                        @if($loan->user->phone)
                                        <a href="#" class="d-flex align-items-center text-primary text-hover-primary mb-2">
                                            {{ $loan->user->phone }}</a>
                                        @endif

                                        @if($loan->user->dob)
                                        <a href="#" class="d-flex align-items-center text-primary text-hover-primary mb-2">
                                            DOB:{{ $loan->user->dob }}</a>
                                        @endif

                                        @if($loan->user->gender)
                                        <a href="#" class="d-flex align-items-center text-primary text-hover-primary mb-2">
                                            {{ $loan->user->gender }}</a>
                                        @endif
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                                <!--begin::Actions-->
                                <div class="d-flex my-4">
                                    {{-- !mportant --}}
                                    {{-- <a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
                                        <i class="ki-duotone ki-check fs-3 d-none"></i>
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">Follow</span>
                                        <!--end::Indicator label-->
                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        <!--end::Indicator progress-->
                                    </a> --}}
                                    {{-- <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Hire Me</a> --}}
                                    <!--begin::Menu-->
                                    <div class="me-0">

                                        {{-- !mportant --}}
                                        {{-- <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-solid ki-dots-horizontal fs-2x"></i>
                                        </button> --}}
                                        <!--begin::Menu 3-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Create Invoice</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
                                                    <i class="ki-duotone ki-information fs-6">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span></a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Generate Bill</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">Subscription</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Plans</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Billing</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Statements</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator my-2"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3">
                                                            <!--begin::Switch-->
                                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                                <!--end::Input-->
                                                                <!--end::Label-->
                                                                <span class="form-check-label text-muted fs-6">Recuring</span>
                                                                <!--end::Label-->
                                                            </label>
                                                            <!--end::Switch-->
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-1">
                                                <a href="#" class="menu-link px-3">Settings</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Title-->
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                {{-- <i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i> --}}
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $loan->amount }}" data-kt-countup-prefix="K">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-400">Principal Amount</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                {{-- <i class="ki-duotone ki-arrow-down fs-3 text-danger me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i> --}}
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-prefix="K" data-kt-countup-value="{{ App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan_product->id) }}">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-400">Est. Repayment</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                {{-- <i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i> --}}
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ App\Models\Loans::customer_balance($loan->user->id) }}" data-kt-countup-prefix="K">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-400">Pending Repayments</div>
                                            <!--end::Label-->
                                        </div>
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                {{-- <i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i> --}}
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $loan->repayment_plan }}" data-kt-countup-postfix="Months ">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-400">Duration (Months)</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Progress-->
                                {{-- <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                    <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                        <span class="fw-semibold fs-6 text-gray-400">Profile Compleation</span>
                                        <span class="fw-bold fs-6">50%</span>
                                    </div>
                                    <div class="h-5px mx-3 w-100 bg-light mb-3">
                                        <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> --}}
                                <!--end::Progress-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Navs-->
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#repayments_tab" data-bs-toggle="tab">Repayments</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            {{-- <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="#loan_terms_tab" data-bs-toggle="tab">Loan Terms</a> --}}
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#loan_schedule_tab" data-bs-toggle="tab">Loan Schedule</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            {{-- <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#pending_settings_tab" data-bs-toggle="tab">Pending Settings</a> --}}
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            {{-- <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#loan_collateral_tab" data-bs-toggle="tab">Loan Collateral</a> --}}
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#expenses_tab" data-bs-toggle="tab">Expenses</a>
                        </li>
                        <!--end::Nav item-->
                        <!-- Add other nav items here -->
                    </ul>
                    <!--begin::Navs-->
                </div>
            </div>


             @include('livewire.dashboard.__parts.dash-alerts')
            <!--end::Navbar-->
            <div class="tab-content">
                <!-- Tab content for Repayments -->
                <div class="tab-pane fade" id="repayments_tab">
                    <div class="d-flex flex-wrap flex-stack mb-6">
                        <!--begin::Heading-->
                        <h3 class="fw-bold my-2">Repayment Details
                        {{-- !mportant --}}
                        <span class="fs-6 text-gray-400 fw-semibold ms-1">Active</span></h3>
                        <!--end::Heading-->
                        <!--begin::Actions-->
                         <div class="d-flex flex-wrap my-2">
                            {{-- <div class="me-4">
                                <!--begin::Select-->
                                <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm bg-body border-body w-125px">
                                    <option value="Active" selected="selected">Active</option>
                                    <option value="Approved">In Progress</option>
                                    <option value="Declined">To Do</option>
                                    <option value="In Progress">Completed</option>
                                </select>
                                <!--end::Select-->
                            </div> --}}
                            <a href="{{ route('make-payment') }}" class="btn btn-primary btn-sm">Proceed to Make Payements</a>
                            {{-- <a href="{{ route('make-payment') }}" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">Proceed to Make Payements</a> --}}
                        </div>
                        <!--end::Actions-->
                    </div>

                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-md-12 col-xl-12">
                            <!--begin::Card-->
                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                                <thead class="border-bottom border-gray-200">
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th class="w-100px">Date</th>
                                        <th class="w-100px">Loan</th>
                                        <th class="w-300px">Principal(K)</th>
                                        <th class="w-100px">Payback(K)</th>
                                        <th class="w-100px">Amount Settled(K)</th>
                                        <th class="w-100px">Balance(K)</th>
                                        <th class="w-100px">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="fs-6 fw-semibold text-gray-600">
                                    @forelse (App\Models\Transaction::customer_transactions($loan->user_id) as $item)
                                    <tr>
                                        <td>{{ $item->created_at->toFormattedDateString() }}</td>
                                        <td>
                                            <a href="#" class="text-gray-600 text-hover-primary mb-1">{{ $item->application->loan_product->name }}</a>
                                        </td>
                                        <td><b>K {{ $item->application->amount }}</b></td>
                                        <td >
                                            <a href="#" class="bg-active-light-primary">
                                            K {{
                                                number_format(App\Models\Application::payback($item->application->amount, $item->application->repayment_plan, $item->application->loan_product_id), 2, '.', ',')
                                            }}
                                            </a>
                                        </td>
                                        <td>
                                            <span class="bg-light-success">
                                                K {{  $item->amount_settled  }}
                                            </span>
                                        </td>
                                        <td>
                                           K {{ App\Models\Loans::loan_balance( $item->application->id) }}
                                        </td>
                                        <td>
                                            <span class="badge badge-light">
                                                Repayment
                                            </span>
                                        </td>
                                    </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Card-->
                        </div>
                    </div>
                </div>

                <!-- Tab content for Loan Terms -->
                <div class="tab-pane fade" id="loan_terms_tab">

                </div>

                <!-- Tab content for Loan Schedule -->
                <div class="tab-pane show active" id="loan_schedule_tab">
                    @if ($amortization_table)
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Due Date</th>
                                    <th>Principal Amount</th>
                                    <th>Interest Amount</th>
                                    {{-- <th>Penalty Amount</th> --}}
                                    <th>Due Amount</th>
                                    <th>Principal Balance</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($amortization_table['amortization_table']['installments'] as $index => $row)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $row['due_date'] }}</td>
                                    <td>{{ $row['principal'] }}</td>
                                    <td>{{ $row['interest'] }}</td>
                                    {{-- <td>{{ $row['fee_amount'] }}</td> --}}
                                    {{-- <td>{{ isset($row['penalty']) ? $row['penalty'] : '0.00' }}</td> --}}
                                    <td>{{ $row['due'] }}</td>
                                    <td>{{ $row['principal_balance'] }}</td>
                                    <td>{{ $row['description'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                <!-- Tab content for Pending Settings -->
                <div class="tab-pane fade" id="pending_settings_tab">
                    <!-- Content for Pending Settings tab -->
                </div>

                <!-- Tab content for Loan Collateral -->
                <div class="tab-pane fade" id="loan_collateral_tab">
                    <!-- Content for Loan Collateral tab -->
                </div>

                <!-- Tab content for Expenses -->
                <div class="tab-pane fade" id="expenses_tab">

                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_create_expense">Create Loan Expense</a>

                    @if ($current_expenses)
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($current_expenses as $index => $exp)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $exp->date }}</td>
                                <td>{{ $exp->name }}</td>
                                <td>{{ $exp->amount }}</td>
                                <td>{{ $exp->type }}</td>
                                <td>{{ $exp->description }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    @endif
                </div>

                <!-- Add other tab content sections here -->
            </div>
            <!--begin::Toolbar-->

            @include('livewire.dashboard.loans.__modals.create-expense')
            {{-- @include('livewire.dashboard.loans.__modals.loan-detailed-modals') --}}
        </div>
        <!--end::Container-->
    </div>
    <script>
        $(document).ready(function() {
            // Handle tab switching behavior
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                var target = $(e.target).attr("href"); // activated tab
                $('.tab-pane').not(target).removeClass('show active'); // hide other tab content
                $(target).addClass('show active'); // show activated tab content
            });
        });
    </script>
</div>
