<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Navbar-->
            <div class="mb-6 card">
                <div class="pb-0 card-body pt-9">
                    <!--begin::Details-->
                    <div class="flex-wrap d-flex flex-sm-nowrap">
                        <!--begin: Pic-->
                        <div class="mb-4 me-7">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                @if ($loan->user->profile_photo_path)
                                    <img src="{{ '../public/'.Storage::url($loan->user->profile_photo_path) }}" alt="image" />
                                @else
                                    <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg" alt="image"/>
                                @endif
                                <div class="bottom-0 mb-6 border border-4 position-absolute translate-middle start-100 bg-success rounded-circle border-body h-20px w-20px"></div>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="flex-wrap mb-2 d-flex justify-content-between align-items-start">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="mb-2 d-flex align-items-center">
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
                                    <div class="flex-wrap gap-4 mb-4 d-flex fw-semibold fs-6 pe-2">
                                        @if($loan->user->nrc_no)
                                        <a href="#" class="mb-2 d-flex align-items-center text-primary text-hover-primary me-5">
                                            {{ $loan->user->id_type ?? 'NRC: '}}
                                            {{ $loan->user->nrc_no ?? $loan->user->nrc}}</a>
                                        @endif

                                        @if($loan->user->occupation)
                                        <a href="#" class="mb-2 d-flex align-items-center text-primary text-hover-primary me-5">
                                            {{ $loan->user->occupation }}</a>
                                        @endif

                                        @if($loan->user->jobTitle)
                                        <a href="#" class="mb-2 d-flex align-items-center text-primary text-hover-primary me-5">
                                            {{ $loan->user->jobTitle }}</a>
                                        @endif

                                        @if($loan->user->address)
                                        <a href="#" class="mb-2 d-flex align-items-center text-primary text-hover-primary me-5">
                                            {{ $loan->user->address }}</a>
                                        @endif

                                        @if($loan->user->email)
                                        <a href="#" class="mb-2 d-flex align-items-center text-primary text-hover-primary">
                                            {{ $loan->user->email }}</a>
                                        @endif

                                        @if($loan->user->phone)
                                        <a href="#" class="mb-2 d-flex align-items-center text-primary text-hover-primary">
                                            {{ $loan->user->phone }}</a>
                                        @endif

                                        @if($loan->user->dob)
                                        <a href="#" class="mb-2 d-flex align-items-center text-primary text-hover-primary">
                                            DOB:{{ $loan->user->dob }}</a>
                                        @endif

                                        @if($loan->user->gender)
                                        <a href="#" class="mb-2 d-flex align-items-center text-primary text-hover-primary">
                                            {{ $loan->user->gender }}</a>
                                        @endif
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                                <!--begin::Actions-->
                                <div class="my-4 d-flex">

                                    {{-- <a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
                                        <i class="ki-duotone ki-check fs-3 d-none"></i>
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">Follow</span>
                                        <!--end::Indicator label-->
                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">Please wait...
                                        <span class="align-middle spinner-border spinner-border-sm ms-2"></span></span>
                                        <!--end::Indicator progress-->
                                    </a> --}}
                                    {{-- <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Hire Me</a> --}}
                                    <!--begin::Menu-->
                                    <div class="me-0">

                                        {{-- <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-solid ki-dots-horizontal fs-2x"></i>
                                        </button> --}}
                                        <!--begin::Menu 3-->
                                        <div class="py-3 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="px-3 menu-item">
                                                <div class="px-3 pb-2 menu-content text-muted fs-7 text-uppercase">Payments</div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">Create Invoice</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link flex-stack">Create Payment
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
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">Generate Bill</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                                <a href="#" class="px-3 menu-link">
                                                    <span class="menu-title">Subscription</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="py-4 menu-sub menu-sub-dropdown w-175px">
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Plans</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Billing</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Statements</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="my-2 separator"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <div class="px-3 menu-content">
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
                                            <div class="px-3 my-1 menu-item">
                                                <a href="#" class="px-3 menu-link">Settings</a>
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
                            <div class="flex-wrap d-flex flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <!--begin::Stats-->
                                    <div class="flex-wrap d-flex">
                                        <!--begin::Stat-->
                                        <div class="px-4 py-3 mb-3 border border-gray-300 border-dashed rounded min-w-125px me-6">
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
                                            <div class="text-gray-400 fw-semibold fs-6">Principal Amount</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="px-4 py-3 mb-3 border border-gray-300 border-dashed rounded min-w-125px me-6">
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
                                            <div class="text-gray-400 fw-semibold fs-6">Est. Repayment</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="px-4 py-3 mb-3 border border-gray-300 border-dashed rounded min-w-125px me-6">
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
                                            <div class="text-gray-400 fw-semibold fs-6">Pending Repayments</div>
                                            <!--end::Label-->
                                        </div>
                                        <div class="px-4 py-3 mb-3 border border-gray-300 border-dashed rounded min-w-125px me-6">
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
                                            <div class="text-gray-400 fw-semibold fs-6">Duration (Months)</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Progress-->
                                {{-- <div class="mt-3 d-flex align-items-center w-200px w-sm-300px flex-column">
                                    <div class="mt-auto mb-2 d-flex justify-content-between w-100">
                                        <span class="text-gray-400 fw-semibold fs-6">Profile Compleation</span>
                                        <span class="fw-bold fs-6">50%</span>
                                    </div>
                                    <div class="mx-3 mb-3 h-5px w-100 bg-light">
                                        <div class="rounded bg-success h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
                    <ul class="border-transparent nav nav-stretch nav-line-tabs nav-line-tabs-2x fs-5 fw-bold">
                        <!--begin::Nav item-->
                        <li class="mt-2 nav-item">
                            <a class="py-5 nav-link text-active-primary ms-0 me-10 active" href="#repayments_tab" data-bs-toggle="tab">Repayments</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="mt-2 nav-item">
                            {{-- <a class="py-5 nav-link text-active-primary ms-0 me-10 active" href="#loan_terms_tab" data-bs-toggle="tab">Loan Terms</a> --}}
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="mt-2 nav-item">
                            <a class="py-5 nav-link text-active-primary ms-0 me-10" href="#loan_schedule_tab" data-bs-toggle="tab">Loan Schedule</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="mt-2 nav-item">
                            {{-- <a class="py-5 nav-link text-active-primary ms-0 me-10" href="#pending_settings_tab" data-bs-toggle="tab">Pending Settings</a> --}}
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="mt-2 nav-item">
                            {{-- <a class="py-5 nav-link text-active-primary ms-0 me-10" href="#loan_collateral_tab" data-bs-toggle="tab">Loan Collateral</a> --}}
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="mt-2 nav-item">
                            <a class="py-5 nav-link text-active-primary ms-0 me-10" href="#expenses_tab" data-bs-toggle="tab">Expenses</a>
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
                <div class="tab-pane active" id="repayments_tab">
                    <div class="flex-wrap mb-6 d-flex flex-stack">
                        <!--begin::Heading-->
                        <h3 class="my-2 fw-bold">Repayment Details

                        <span class="text-gray-400 fs-6 fw-semibold ms-1">Active</span></h3>
                        <!--end::Heading-->
                        <!--begin::Actions-->
                         <div class="flex-wrap my-2 d-flex">
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
                            @if (App\Models\Transaction::customer_transactions($loan->user_id)->isNotEmpty())
                            <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                                <thead class="border-gray-200 border-bottom">
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
                                <tbody class="text-gray-600 fs-6 fw-semibold">
                                    @forelse (App\Models\Transaction::customer_transactions($loan->user_id) as $item)
                                    <tr>
                                        <td>{{ $item->created_at->toFormattedDateString() }}</td>
                                        <td>
                                            <a href="#" class="mb-1 text-gray-600 text-hover-primary">{{ $item->application->loan_product->name }}</a>
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
                            @else
                                <div class="flex items-center justify-content-center">
                                    <img style="border-radius: 10%" src="https://i.pinimg.com/236x/ae/8a/c2/ae8ac2fa217d23aadcc913989fcc34a2.jpg" alt="">
                                </div>
                            @endif
                            <!--begin::Card-->

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
