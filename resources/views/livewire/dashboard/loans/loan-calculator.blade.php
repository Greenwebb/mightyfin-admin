
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="px-10 py-4">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">Loan Calculator</span>
        </h3>
    </div>

    <div class="px-8">
        @if ($amortization_table_flat_rate)
        <div class="card mt-5">
            <div class="card-header bg-secondary">
                <h3 class="card-title text-info">Amortization Table</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Due Date</th>
                            <th>Principal</th>
                            <th>Interest</th>
                            <th>Fees</th>
                            <th>Due</th>
                            <th>Principal Balance</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($amortization_table_flat_rate['installments'] as $index => $row)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $row['due_date'] }}</td>
                            <td>{{ $row['principal'] }}</td>
                            <td>{{ $row['interest'] }}</td>
                            <td>{{ $row['fees'] }}</td>
                            <td>{{ $row['due'] }}</td>
                            <td>{{ $row['principal_balance'] }}</td>
                            <td>{{ $row['description'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

    </div>

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <form wire:submit.prevent="calculateLoan()" id="kt_content_container" class="container-xxl">
            <div class="card-header border-0 cursor-pointer">
                <div class="alert alert-primary mt-2">
                    <small>
                        You can use this page to calculate the loan value in case of customer inquiries. To add a loan into the system, visit Loans(left menu) → Add Loan.
                    </small>
                </div>
            </div>
            <div class="card mb-5 mb-xl-10">
                <div class="row mb-6 px-10 py-6">
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Product</label>
                    <div class="col-lg-8 fv-row">
                        <select type="text" name="loan_product_id" class="form-control form-control-lg " placeholder="E.g Business Loan" required>
                            <option value="">-- select --</option>
                            @forelse ($this->get_all_loan_products() as $lp)
                            <option {{ $loan->loan_product_id == $lp->id ? 'selected':'' }} value="{{ $lp->id }}">{{ $lp->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="card-header border-0 bg-secondary" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Loan Terms:</h3>
                    </div>
                </div>
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0 text-danger">Principal</h3>
                    </div>
                </div>
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div id="kt_account_profile_details_form" class="form">
                        <div class="card-body p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Principal Amount</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" wire:model.lazy="principal" class="form-control form-control-lg" placeholder="0.00" required/>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Release Date</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" id="release_date_picker" wire:model.lazy="release_date" class="form-control form-control-lg " placeholder="" required>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0 text-danger">Interest:</h3>
                    </div>
                </div>
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div id="kt_account_profile_details_form" class="form">
                        <div class="card-body p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Interest Method</label>
                                <div class="col-lg-8 fv-row">
                                    <select type="text" wire:model.lazy="loan_interest_method" class="form-control form-control-lg " placeholder="Company name" value="Keenthemes">
                                        @forelse ($interest_methods as $option)
                                        <option value="{{ $option->name }}">{{ $option->name }}</option>
                                        @empty
                                            <span>No Methods</span>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Interest Type</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <div class="d-block align-items-center mt-3">
                                        @forelse ($interest_types as $option)
                                            <label for="{{ $option->name }}" class="mt-2 form-check form-check-custom form-check-inline form-check-solid me-5">
                                                <input id="{{ $option->name }}" class="form-check-input" wire:model.lazy="loan_interest_type" type="radio" value="{{ $option->id }}" />
                                                <span class="fw-semibold ps-2 fs-6"> {{ $option->description }} </span>
                                            </label>
                                        @empty

                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Loan Interest</label>
                                <div class="col-lg-8 fv-row row d-flex">
                                    <div class="col-lg-6">
                                        <input type="text" wire:model.lazy="loan_interest_value" class="form-control form-control-lg " placeholder="%" required/>
                                    </div>
                                    <div class="col-lg-3">
                                        <select type="text" wire:model.lazy="loan_interest_period" class="form-select form-control form-control-lg " placeholder="Company name" value="Keenthemes">
                                            <option value="per-day">Per Day</option>
                                            <option value="per-week">Per Week</option>
                                            <option value="per-month" selected>Per Month</option>
                                            <option value="per-year">Per Year</option>
                                            <option value="per-loan">Per Loan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-danger m-0">Duration:</h3>
                    </div>
                </div>
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div id="kt_account_profile_details_form" class="form">
                        <div class="card-body p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Loan Duration Period</label>
                                <div class="col-lg-8 fv-row row d-flex">
                                    <div class="col-lg-6">
                                        <div class="col-lg-8 input-group">
                                            <button class="btn btn-secondary" type="button" wire:click="decreaseDurationValue">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8"/>
                                                </svg>
                                            </button>
                                            <input type="text" wire:model.lazy="loan_duration_value" class="form-control form-control-lg" placeholder="" required>
                                            <button class="btn btn-secondary" type="button" wire:click="increaseDurationValue">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div><div class="col-lg-4">
                                        <select type="text" wire:model.lazy="loan_duration_period" wire:change="updateLoanDurationPeriod" class="form-select form-control form-control-lg" placeholder="Company name" value="Keenthemes">
                                            <option value="day" selected>Days</option>
                                            <option value="week">Weeks</option>
                                            <option value="month">Month</option>
                                            <option value="year">Years</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-header border-0 cursor-pointer py-3" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-danger m-0">Repayments:</h3>
                    </div>
                </div>
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div id="kt_account_profile_details_form" class="form">
                        <div class="card-body p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Repayment Cycle</label>
                                <div class="col-lg-8 fv-row">
                                    <div class="mt-3 align-items-start" style="display: block">
                                        <select wire:model.lazy="loan_repayment_cycle" wire:change="updateLoanDurationPeriod" class="form-select form-control-lg">
                                            @foreach ($repayment_cycles as $option)
                                                <option value="{{ $option->name }}">{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Minimum Number of Repayments</label>
                                <div class="col-lg-8 fv-row">
                                    <div class="col-lg-8 input-group">
                                        <button class="btn btn-secondary" type="button" wire:click="decreaseRepayments">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8"/>
                                            </svg>
                                        </button>
                                        <input type="text" wire:model.lazy="minimum_num_of_repayments" class="form-control form-control-lg" placeholder="1">
                                        <button class="btn btn-secondary" type="button" wire:click="increaseRepayments">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kt_account_settings_deactivate" class="collapse show">
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-primary fw-semibold">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2" viewBox="0 0 16 16">
                                <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v3.5A1.5 1.5 0 0 1 11.5 6h-7A1.5 1.5 0 0 1 3 4.5V1H1.5a.5.5 0 0 0-.5.5m9.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z"/>
                            </svg>
                        </span>
                        Calculate
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Function to scroll to the top of the page
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Add an event listener to the submit button
        document.getElementById('kt_account_deactivate_account_submit').addEventListener('click', function() {
            // Scroll to the top when the button is clicked
            scrollToTop();
        });
    </script>

</div>
