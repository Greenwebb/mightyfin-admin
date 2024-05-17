<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body pt-15">
                            <!--begin::Summary-->
                            <div class="d-flex flex-center flex-column mb-5">

                                <div class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">
                                    <h1 class="text-info">Verification</h1>
                                </div>
                                <!--begin::Avatar-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    @if ($loan->user->profile_photo_path)
                                        <img src="{{ '../public/'.Storage::url($loan->user->profile_photo_path) }}" alt=""/>
                                    @else
                                        <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg" alt=""/>
                                    @endif
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">
                                    {{ $loan->user->fname.' '.$loan->user->lname }}
                                </a>
                                <!--end::Name-->
                                <!--begin::Position-->
                                <div class="fs-5 fw-semibold text-muted mb-6">{{ $loan->user->occupation }}</div>
                                <!--end::Position-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap flex-center">
                                    <!--begin::Stats-->
                                    <div class="row justify-content-center">
                                        <div
                                            class="col-lg-4 border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-50px">ZMW {{ $loan->amount}}</span>
                                                <i class="ki-duotone ki-usd fs-3 text-danger">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <div class="fw-semibold text-muted">Principle<br>Amount</div>
                                        </div>
                                        <div
                                            class="col-lg-4 border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-50px">{{ $loan->repayment_plan ?? 1}} (Months)</span>
                                                <i class="ki-duotone ki-usd fs-3 text-danger">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <div class="fw-semibold text-muted">Loan Duration</div>
                                        </div>
                                        <div
                                            class="col-lg-4 border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-50px">K {{ App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan_product->id) }}</span>
                                                <i class="ki-duotone ki-usd fs-3 text-danger">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <div class="fw-semibold text-muted">Total <br> Repayment</div>
                                        </div>
                                        <div
                                            class="col-lg-4 border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                            <div class="fs-4 fw-bold text-gray-700">

                                                <span class="w-50px">K {{ $amortization_table['amortization_table']['installments'][0]['due'] }}</span>
                                                {{-- <span class="w-50px">K {{ App\Models\Application::monthly_installment($loan->amount, $loan->repayment_plan) }}</span> --}}
                                                <i class="ki-duotone ki-usd fs-3 text-danger">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <div class="fw-semibold text-muted">Monthly<br>Repayment</div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold rotate collapsible" data-bs-toggle="collapse"
                                    href="#kt_customer_view_details" role="button" aria-expanded="false"
                                    aria-controls="kt_customer_view_details">Details
                                    <span class="ms-2 rotate-180">
                                        <i class="ki-duotone ki-down fs-3"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-3"></div>
                            <div id="kt_customer_view_details" class="collapse show">
                                <div class="py-5 fs-6">
                                    <div class="fw-bold mt-5">Account ID</div>
                                    <div class="text-gray-600">ID-{{$loan->user->id}} </div>
                                    <div class="fw-bold mt-5">Gender</div>
                                    <div class="text-gray-600">{{ ucwords($loan->gender) }}</div>
                                    <div class="fw-bold mt-5">Email</div>
                                    <div class="text-gray-600">
                                        <a href="mailto:{{$loan->user->email}}"
                                            class="text-gray-600 text-hover-primary">{{ $loan->user->email ?? 'Not set'}}</a>
                                    </div>
                                    <div class="fw-bold mt-5">Address</div>
                                    <div class="text-gray-600">
                                        {{ $loan->user->address ?? 'Not set'}}
                                    </div>
                                    <div class="fw-bold mt-5">Phone</div>
                                    <div class="text-gray-600">+260{{ $loan->phone ?? ' --' }}</div>
                                    <div class="fw-bold mt-5">Interest Rate</div>
                                    <div class="text-gray-600">{{ App\Models\Application::interest_rate($loan_product->id) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="flex-lg-row-fluid ms-lg-15">
                    <div class="float-end">

                        @if ($this->my_review_status($loan->id) == 1)

                            @can('approve loan')
                                <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click"
                                    data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Action
                                    <i class="ki-duotone ki-down fs-2 me-0"></i>
                                </a>
                            @endcan

                        @elseif (auth()->user()->hasRole('admin'))
                            <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click"
                                data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Action
                                <i class="ki-duotone ki-down fs-2 me-0"></i>
                            </a>
                        @else
                        <p>This loan application was not assigned to you.</p>
                        @endif

                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true">
                                {{-- <div class="menu-item px-5">
                                    <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Payments</div>
                                </div> --}}
                                <div class="menu-item px-5">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_decline_warning" wire:click="setLoanID({{$loan->id}})" class="menu-link px-5"> Decline </a>
                                </div>
                                <div class="menu-item px-5">
                                    <a href="#" wire:click="accept({{$loan->id}})" class="menu-link px-5"> Approve </a>
                                </div>
                        </div>
                    </div>



                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_tab">
                                <small>CRB</small>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                href="#kt_credit_assement_tab">
                                <small>Risk Assement</small>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_loan_details">
                                <small>Loan Info</small>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true"
                                data-bs-toggle="tab" href="#kt_customer_view_documents">
                                <small>Uploads</small>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true"
                                data-bs-toggle="tab" href="#kt_customer_view_activity">Activity Log</a>
                        </li> --}}
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                {{-- <div class="card-header border-0">
                                    <div class="card-title">
                                        <h4 class="fw-bold mb-0">CRB </h4>
                                    </div>
                                </div> --}}

                                <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                    <div class="py-0" data-kt-customer-payment-method="row">
                                        <div id="kt_customer_view_payment_method_1"
                                             class="collapse show fs-6 ps-10"
                                             data-bs-parent="#kt_customer_view_payment_method">
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">CRB Product</label>

                                            <select type="text" wire:model.lazy="code"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="" required>
                                                    <option value="">--select-</option>
                                                    @forelse ($crb_selected_products as $item)
                                                    <option value="{{ $item->crb_product->name }}">{{ $item->crb_product->name }}</option>
                                                    @empty
                                                    <option value="">None</option>
                                                    @endforelse
                                            </select>
                                            <br>
                                            <!-- Show loading spinner while the action is processing -->
                                            <button class="btn btn-primary" wire:click="CheckCRB()" wire:loading.attr="disabled">
                                                <span wire:loading.remove>Submit</span>
                                                <span wire:loading>Loading...</span>
                                            </button>
                                            <!-- Preloader icon to display while the action is processing -->
                                            <div wire:loading wire:target="CheckCRB()">
                                                <div class="spinner-border text-primary" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-10 mt-10">
                                        {{-- @if(isset($crb_results['values']) && count($crb_results['values']) > 0) --}}
                                            <div>
                                                <h6 class="text-muted">Result Information</h6>
                                                <hr>
                                                
                                                {{-- <div>
                                                    {!! $crb_results['html'] !!}
                                                </div> --}}
                                                <h6>
                                                    @switch($crb_results['values'][5]['value'])
                                                        @case(200)
                                                            Product request processed successfully
                                                            @break
                                                        @case(202)
                                                            Credit Reference Number not found
                                                            @break
                                                        @case(203)
                                                            Multiple Credit Reference Number Found
                                                            @break
                                                        @case(204)
                                                            Invalid report reason
                                                        @break
                                                        @default

                                                    @endswitch
                                                </h6>
                                            </div>
                                            <br>
                                            <br>
                                            <h6 class="text-muted">More Details</h6>
                                            <hr>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th><b>Element</b></th>
                                                    <th><b>Status</b></th>
                                                    <th><b>Code</b></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($crb_results['values'] as $value)
                                                    <tr>
                                                        <td>{{ $value['tag'] }}</td>
                                                        <td>{{ $value['type'] }}</td>
                                                        <td>{{ $value['value'] }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        {{-- @else
                                            <p>No CRB results available.</p>
                                        @endif --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="kt_credit_assement_tab"
                            role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                    {{-- <div class="py-0" data-kt-customer-payment-method="row">
                                        <div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                                            <div class="d-flex gap-10 flex-wrap py-5">
                                                <div class="w-full">
                                                    <span class="font-bold"><b>Debt Ratio (%)</b></span>
                                                    <input type="number" disabled value="40" class="form-control" id="debt_ratio">
                                                </div>

                                                <div class="w-full">
                                                    <span class="font-bold"><b>Basic Pay</b></span>
                                                    <input type="number" class="form-control" id="basic_pay">
                                                </div>

                                                <div class="w-full">
                                                    <span class="font-bold"><b>Net Pay</b></span>
                                                    <input type="number" class="form-control" id="net_pay">
                                                </div>

                                                <div class="w-full">
                                                    <span class="text-primary" style="color:blueviolet"><b>Possible Monthly Calculation (PMC)</b></span>
                                                    <input type="text" disabled class="form-control" wire:model='plp' id="result_amount">
                                                </div>
                                            </div>
                                            <button id="calculateRisk" class="btn btn-sm btn-primary">Check</button>
                                        </div>
                                    </div> --}}

                                    <div id="plp_rule" class="container mt-4">
                                        <div class="alert alert-danger">
                                            <div class="d-flex">
                                                <span class="col-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-lightbulb-fill" viewBox="0 0 16 16">
                                                        <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6m3 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1-.5-.5"/>
                                                    </svg>
                                                </span>
                                                <p class="col-10">
                                                    Principal Monthly Calculation is more than the Monthly Installment, you might need to increase the number of months for
                                                    the loan or reduce the principal amount being requested.
                                                </p>
                                            </div>
                                            <div class="justify-content-between d-flex">
                                                @if ($loan_notifications)
                                                    <button id="notifyUserBtn" class="btn btn-light btn-xs">
                                                        Notify {{ $loan->user->fname .' '.$loan->user->lname }} about this
                                                    </button>
                                                @else
                                                    <button id="notifyUserBtn" class="btn btn-light btn-xs">
                                                        Notify {{ $loan->user->fname .' '.$loan->user->lname }} about this
                                                    </button>
                                                @endif
                                                <button wire:click="acceptSuggestionBtn" class="btn btn-primary btn-xs">Accept Suggestion</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Plp success --}}
                                    <div id="plp_success" class="container mt-4">
                                        <div class="alert alert-success">
                                            <div class="d-flex">
                                                <span class="col-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-lightbulb-fill" viewBox="0 0 16 16">
                                                        <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6m3 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1-.5-.5"/>
                                                    </svg>
                                                </span>
                                                <p class="col-10">
                                                    Eligible Loan Application
                                                    <br/>
                                                    {{ $loan_ai['message'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- No Plp --}}
                                    <div id="no_plp" class="container mt-4">
                                        <div class="alert alert-danger">
                                            <div class="d-flex">
                                                <span class="col-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-lightbulb-fill" viewBox="0 0 16 16">
                                                        <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6m3 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1-.5-.5"/>
                                                    </svg>
                                                </span>
                                                <p class="col-10">
                                                    AI Feed
                                                    <br/>
                                                    {{ $loan_ai['message'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="shimmer_loader" class="w-full">
                                        <img src="{{ asset('public/mfs/gif/shimmer.gif') }}" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_customer_view_overview_loan_details" role="tabpanel">
                            <!--begin::Card-->
                            <div class="row g-5 g-xl-12">
                                <div class="col-xl-12">
                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                            <div class="py-0" data-kt-customer-payment-method="row">
                                                <div id="kt_customer_view_payment_method_1"
                                                    class="collapse show fs-6 ps-10"
                                                    data-bs-parent="#kt_customer_view_payment_method">
                                                    <div class="d-flex flex-wrap py-5">
                                                        <div class="flex-equal me-5">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Amount</td>
                                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                    <td class="text-gray-800"><b>K{{ $loan->amount }}</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Loan Product</td>
                                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                                    <td class="text-gray-800">{{ $loan_product->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">KYC</td>
                                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                    <td class="text-gray-800">
                                                                        <small class="text-white d-block fw-bold mt-2">
                                                                            @if($loan->complete == 1)
                                                                                <small class="text-white bg-success p-2 rounded">{{ 'Completed' }}</small>
                                                                            @else
                                                                                <small class="text-white bg-danger p-2 rounded">{{ 'Incomplete' }}</small>
                                                                            @endif
                                                                        </small>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Created On</td>
                                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                    <td class="text-gray-800">
                                                                        <small class="text-dark d-block fw-bold mt-2">
                                                                                {{ $loan->created_at->toFormattedDateString() }}
                                                                        </small>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <div class="card-header border-0">
                                            <div class="card-title">
                                                <h4 class="fw-bold mb-0">Repayment Methods</h4>
                                            </div>
                                        </div>

                                        <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                            <div class="py-0" data-kt-customer-payment-method="row">
                                                <div id="kt_customer_view_payment_method_1"
                                                    class="collapse show fs-6 ps-10"
                                                    data-bs-parent="#kt_customer_view_payment_method">
                                                    <div class="d-flex flex-wrap py-5">
                                                        <div class="flex-equal me-5">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                @if($data->bank !== null)
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Name</td>
                                                                    <td class="text-gray-800">{{ $data->bank->first()->accountNames }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Number</td>
                                                                    <td class="text-gray-800">{{ $data->bank->first()->accountNumber }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Branch Name</td>
                                                                    <td class="text-gray-800">{{ $data->bank->first()->branchName }}</td>
                                                                </tr>
                                                                @else
                                                                <span class="text-muted">Not Set</span>
                                                                @endif
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_customer_view_documents" role="tabpanel">
                            <!--begin::Earnings-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                {{-- <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h4>KYC Documents</h4>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Button-->
                                        <button type="button" class="btn btn-sm btn-light-primary">
                                            <i class="ki-duotone ki-cloud-download fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>Download Report</button>
                                    </div>
                                </div> --}}

                                <div class="card-body py-0">
                                    <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
                                        <div class="row">
                                            <div class="row col-6">
                                                @if ($loan->user->uploads->where('name', 'nrc_file')->isNotEmpty())
                                                    <div class="col-6">
                                                        <a href="{{ 'https://app.mightyfinance.co.zm/public/'.Storage::url($loan->user->uploads->where('name', 'nrc_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                            <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                        </a>
                                                        <p class="file-list">NRC uploaded on
                                                            {{
                                                                $loan->user->uploads != null ?
                                                                $loan->user->uploads->where('name', 'nrc_file')->first()->created_at->toFormattedDateString() : ''
                                                            }}
                                                        </p>
                                                    </div>
                                                @endif
                                                @if ($loan->user->uploads->where('name', 'tpin_file')->isNotEmpty())
                                                    <div class="col-6">
                                                        <a href="{{ 'https://app.mightyfinance.co.zm/public/'.Storage::url($loan->user->uploads->where('name', 'tpin_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                            <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                        </a>
                                                        <p class="file-list">Tpin uploaded on
                                                            {{
                                                                $loan->user->uploads != null ?
                                                                $loan->user->uploads->where('name', 'tpin_file')->first()->created_at->toFormattedDateString() : ''
                                                            }}
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row col-6">
                                                @if ($loan->user->uploads->where('name', 'preapproval')->isNotEmpty())
                                                    <div class="col-6">
                                                        <a href="{{ 'https://app.mightyfinance.co.zm/public/'.Storage::url($loan->user->uploads->where('name', 'preapproval')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                            <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                        </a>
                                                        <p class="file-list">Preapproval uploaded on
                                                            {{
                                                                $loan->user->uploads != null ?
                                                                $loan->user->uploads->where('name', 'preapproval')->first()->created_at->toFormattedDateString() :''
                                                            }}</p>
                                                    </div>
                                                @endif
                                                @if ($loan->user->uploads->where('name', 'letterofintro')->isNotEmpty())
                                                    <div class="col-6">
                                                        <a href="{{ 'https://app.mightyfinance.co.zm/public/'.Storage::url($loan->user->uploads->where('name', 'letterofintro')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                            <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                        </a>
                                                        <p class="file-list">Letter of Introduction uploaded on
                                                            {{
                                                            $loan->user->uploads != null ?
                                                            $loan->user->uploads->where('name', 'letterofintro')->first()->created_at->toFormattedDateString() : ''
                                                        }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row col-12">
                                                @if ($loan->user->uploads->where('name', 'bankstatement')->isNotEmpty())
                                                    <div class="col-3">
                                                        <a href="{{ 'https://app.mightyfinance.co.zm/public/'.Storage::url($loan->user->uploads->where('name', 'bankstatement')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                            <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                        </a>
                                                        <p class="file-list">Bank Statement uploaded on
                                                            {{
                                                                $loan->user->uploads != null ?
                                                                $loan->user->uploads->where('name', 'bankstatement')->first()->created_at->toFormattedDateString() : ''
                                                            }}
                                                        </p>
                                                    </div>
                                                @endif
                                                @if ($loan->user->uploads->where('name', 'payslip_file')->isNotEmpty())
                                                    <div class="col-3">
                                                        <a href="{{ 'https://app.mightyfinance.co.zm/public/'.Storage::url($loan->user->uploads->where('name', 'payslip_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                            <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                        </a>
                                                        <p class="file-list">Payslip uploaded on {{
                                                        $loan->user->uploads != null ?
                                                        $loan->user->uploads->where('name', 'payslip_file')->first()->created_at->toFormattedDateString() :''
                                                        }}</p>
                                                    </div>
                                                @endif
                                                @if ($loan->user->uploads->where('name', 'passport')->isNotEmpty())
                                                    <div class="col-3">
                                                        <a href="{{ 'https://app.mightyfinance.co.zm/public/'.Storage::url($loan->user->uploads->where('name', 'passport')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                            <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                        </a>
                                                        <p class="file-list">Passport Size photo uploaded on
                                                            {{
                                                                $loan->user->uploads != null ?
                                                                $loan->user->uploads->where('name', 'passport')->first()->created_at->toFormattedDateString() : ''
                                                            }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <script>
        document.getElementById('no_plp').style.display = 'none';
        document.getElementById('plp_rule').style.display = 'none';
        document.getElementById('plp_success').style.display = 'none';

        window.onload = function() {
            var debtRatio = 40;
            var basicPay = @json($basic_pay);
            var netPay = @json($net_pay);

            // Perform the calculation
            var debtR = debtRatio / 100;
            var resultAmount = netPay - (basicPay * debtR);

            // Format the result with "K" prefix
            var formattedResult = "K " + resultAmount.toFixed(2);

            // Convert the due amount from JSON, removing commas and converting to float
            var dueAmount = parseFloat(@json($amortization_table['amortization_table']['installments'][0]['due']).replace(/,/g, ''));

            // Show plp rule
            if (resultAmount.toFixed(2) < dueAmount) {
                if (resultAmount === 0) {
                    document.getElementById('no_plp').style.display = 'block';
                }else{
                    // document.getElementById('plp_rule').style.display = 'block';
                }
            } else {
                document.getElementById('plp_rule').style.display = 'none';
                document.getElementById('plp_success').style.display = 'block';
            }
            document.getElementById('shimmer_loader').style.display = 'none';
        };

    </script>

    <script>
        $(document).ready(function() {
            $('#notifyUserBtn').click(function() {
                var $btn = $(this);
                $.ajax({
                    url: '{{ url("api/notify-onplp") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        user_id: '{{ $loan->user->id }}',
                        application_id: '{{ $loan->id }}',
                        suggested_months: '4',
                        suggested_principal: '7000',
                        // Add any additional data you need to send to the controller
                    },
                    beforeSend: function() {
                        // Disable the button and show loading text or spinner
                        $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');
                    },
                    success: function(response) {
                        if(response.resp){
                            // Re-enable the button and revert back to the original text
                            $btn.prop('disabled', false).html('<span class="text-success" style="color:green">Sent Notification to {{ $loan->user->fname }} about this</span>');
                        }else{
                            // Re-enable the button and revert back to the original text
                            $btn.prop('disabled', false).html('<span>Resend Notification to {{ $loan->user->fname }} about this</span>');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>

</div>
