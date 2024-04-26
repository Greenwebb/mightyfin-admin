
<style>
.details-container {
    display: flex;
    flex-direction: row; /* Arrange children in a row */
    justify-content: space-between; /* Space between the columns */
}

.details-column {
    display: flex;
    flex-direction: column;
    flex: 1; /* Each column takes equal width */
}

.details-item {
    display: flex;
    margin-top: 20px; /* Space between items */
    align-items: baseline; /* Align items in a way that their baselines align */
}

.fw-bold {
    width: 150px; /* Fixed width for labels */
    font-weight: bold; /* Bold font style */
}

.text-gray-600 {
    color: #6c757d; /* Gray text color */
    flex-grow: 1; /* Take available space */
}


</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">

            <div class="card mb-5 mb-xl-8">

                <div class="card-body pt-15">

                    <div class="d-flex flex-center flex-column mb-5">

                        <div class="symbol symbol-100px symbol-circle mb-7">
                            @if($data->profile_photo_path == null)
                                @if($data->fname != null && $data->lname != null)
                                    <span class="text-white">{{ $data->fname[0].' '.$data->lname[0] }}</span>
                                @else
                                    <span>{{ $data->name[0] }}</span>
                                @endif
                            @else
                                <img class="rounded-circle bg-primary" src="{{ 'public/'.Storage::url($data->profile_photo_path) }}" />
                            @endif
                        </div>

                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">
                            {{ $data->fname.' '.$data->lname }}
                        </a>

                        <div class="fs-5 fw-semibold text-muted mb-6">
                            @foreach ($data->roles as $role)
                                @if($role->name == 'user')
                                <p>Borrower</p>
                                @else
                                <p>{{ ucwords($role->name) }}</p>
                                @endif
                            @endforeach
                        </div>

                        <div class="d-flex flex-wrap flex-center">
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                <div class="fs-4 fw-bold text-gray-700">
                                    <span class="w-75px">K {{ App\Models\Loans::customer_total_borrowed($data->id) }}</span>
                                    <i class="ki-duotone ki-arrow-up fs-3 text-success">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="fw-semibold text-muted">Total Borrowed</div>
                            </div>
                            <!--end::Stats-->
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                <div class="fs-4 fw-bold text-gray-700">
                                    <span class="w-50px">K {{ App\Models\Loans::customer_total_pending_borrowed($data->id) }}</span>
                                    <i class="ki-duotone ki-arrow-down fs-3 text-danger">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="fw-semibold text-muted">Pending Borrowed</div>
                            </div>
                            <!--end::Stats-->
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                <div class="fs-4 fw-bold text-gray-700">
                                    <span class="w-50px">K {{ App\Models\Loans::loan_balance($data->loans->first()->id) }}</span>
                                    <i class="ki-duotone ki-arrow-up fs-3 text-success">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <small class="fw-semibold text-xs text-muted">Pending Repayment</small>
                            </div>
                            <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                <div class="fs-4 fw-bold text-gray-700">
                                    <span class="w-50px">K {{ App\Models\Loans::customer_total_paid($data->id) }}</span>
                                    <i class="ki-duotone ki-arrow-up fs-3 text-success">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="fw-semibold text-muted">Settled Repayment</div>
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                    </div>


                    <div id="kt_customer_view_details" class="collapse show">
                        <div class="details-container py-5 fs-6">
                            <div class="details-column">
                                <div class="details-item">
                                    <div class="fw-bold">Account ID</div>
                                    <div class="text-gray-600">ID-{{ $data->id }}</div>
                                </div>
                                <div class="details-item">
                                    <div class="fw-bold">Email</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">{{ $data->email }}</a>
                                    </div>
                                </div>
                                <div class="details-item">
                                    <div class="fw-bold">Address</div>
                                    <div class="text-gray-600">
                                        {{ $data->address ?? 'No Address' }}
                                    </div>
                                </div>
                            </div>
                            <div class="details-column">
                                <div class="details-item">
                                    <div class="fw-bold">ID Type</div>
                                    <div class="text-gray-600">{{ $data->id_type ?? 'Not Set' }}</div>
                                </div>
                                <div class="details-item">
                                    <div class="fw-bold">National ID</div>
                                    <div class="text-gray-600">{{ $data->nrc_no ?? $data->nrc ?? 'Not Set' }}</div>
                                </div>
                                <div class="details-item">
                                    <div class="fw-bold">Registered On</div>
                                    <div class="text-gray-600">{{ $data->created_at->diffForHumans() ?? 'Not Set' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    {{-- Loan History --}}
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Loan History
                            <span class="ms-2 rotate-180">
                                <i class="ki-duotone ki-down fs-3"></i>
                            </span>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-3"></div>
                    <div id="kt_customer_view_details" class="collapse show">

                        <table id="kt_customer_view_statement_table_1" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-4">
                            <thead class="border-bottom border-gray-200">
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-100px">Date</th>
                                    <th class="w-100px">Loan</th>
                                    <th class="w-300px">Principal(K)</th>
                                    <th class="w-100px">Payback(K)</th>
                                    <th class="w-100px text-end pe-7">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($data->loans as $loan)
                                <tr>
                                    <td>{{ $loan->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        <a href="#" class="text-gray-600 text-hover-primary">{{ $loan->type }}</a>
                                    </td>
                                    <td> <b>{{ $loan->amount }}</b> </td>
                                    <td class="text-danger text-xs">
                                        {{
                                            number_format(App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan->loan_product_id), 2, '.', ',')
                                        }}
                                    </td>
                                    <td class="text-end">
                                        @if($loan->status == 0)
                                            <span class="badge badge-light-warning">Pending</span>
                                        @elseif($loan->status == 1)
                                            <span class="badge badge-light-success">Open</span>
                                        @elseif($loan->status == 2)
                                            <span class="badge badge-light-primary">Processing</span>
                                        @else
                                            <span class="badge badge-light-danger">Denied</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>

                    </div>

                    <br>
                    {{-- Repayment History --}}
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Repayments History
                            <span class="ms-2 rotate-180">
                                <i class="ki-duotone ki-down fs-3"></i>
                            </span>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-3"></div>
                    <div id="kt_customer_view_details" class="collapse show">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                            <thead class="border-bottom border-gray-200">
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-100px">Date</th>
                                    <th class="w-100px">Loan</th>
                                    <th class="w-300px">Principal(K)</th>
                                    <th class="w-100px">Payback(K)</th>
                                    <th class="w-100px text-end pe-7">Status</th>
                                </tr>
                            </thead>
                            <tbody class="fs-6 fw-semibold text-gray-600">
                                @forelse (App\Models\Transaction::hasTransaction($data->id) as $item)
                                <tr>
                                    <td>{{ $item->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        <a href="#" class="text-gray-600 text-hover-primary mb-1">9673-1893</a>
                                    </td>
                                    <td>$1,200.00</td>
                                    <td class="pe-0 text-end">
                                        <a href="#" class="btn btn-sm btn-light image.png btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="../apps/customers/view.html" class="menu-link px-3">View</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-success">Successful</span>
                                    </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                            <!--end::Table body-->
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
