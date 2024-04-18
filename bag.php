Source: https://chat.openai.com/c/153419ce-0fb7-4c90-869a-717dbbbdf12f

@forelse ($institutions as $option)
<label for="{{ $option->name }}" class="mt-2 form-check form-check-custom form-check-inline form-check-solid me-5">
    <input id="{{ $option->name }}" class="form-check-input" wire:model.lazy="loan_institution" type="checkbox" value="{{ $option->id }}" />
    <span class="fw-semibold ps-2 fs-6">{{ $option->name }} </span>
</label>
<br>
@empty
    <p>No Charges</p>
@endforelse




Comanding
GPT
In loanDisk



use same livewire-property/valriables in calculateReducingBalanceEqualInstallment to calculateInterestOnly


private function calculateReducingBalanceEqualInstallment()
{
    try {
        // Initialize amortization table
        $amortization_table = [
            'installments' => [],
        ];

        // Get the release date and convert it to a Carbon instance
        $release_date = Carbon::parse($this->release_date);

        // Calculate monthly interest rate
        $monthly_interest_rate = $this->loan_interest_value / 100;

        // Calculate total number of installments
        $total_installments = $this->loan_duration_value;

        // Calculate monthly installment using reducing balance method
        $monthly_installment = ($this->principal * $monthly_interest_rate) / (1 - pow(1 + $monthly_interest_rate, -$total_installments));

        // Initialize loan balance
        $loan_balance = $this->principal;

        // Initialize total amounts
        $total_principal = 0;
        $total_interest = 0;
        $total_due = 0;

        // Loop through each installment and calculate details
        for ($i = 1; $i <= $total_installments; $i++) {
            // Calculate due date based on the release date
            $due_date = $release_date->copy()->addMonths($i);

            // Calculate interest for the current installment
            $interest = $loan_balance * $monthly_interest_rate;

            // Calculate principal for the current installment
            $principal = $monthly_installment - $interest;

            // Update loan balance
            $loan_balance -= $principal;

            // Update total amounts
            $total_principal += $principal;
            $total_interest += $interest;
            $total_due += $monthly_installment;

            // Add current installment's data to amortization table
            $amortization_table['installments'][] = [
                'due_date' => $due_date->format('d/m/Y'),
                'principal' => 'K' . number_format($principal, 2),
                'interest' => 'K' . number_format($interest, 2),
                'fee_amount' => '0', // Assuming no fees
                'penalty' => '0', // Assuming no penalties
                'due' => 'K' . number_format($monthly_installment, 2),
                'principal_balance' => 'K' . number_format($loan_balance, 2),
                'description' => ($loan_balance <= 0) ? 'Maturity' : 'Repayment',
            ];
        }

        // Add total row
        $amortization_table['installments'][] = [
            'due_date' => 'Total',
            'principal' => 'K' . number_format($total_principal, 2),
            'interest' => 'K' . number_format($total_interest, 2),
            'fee_amount' => '0',
            'penalty' => '0',
            'due' => 'K' . number_format($total_due, 2),
            'principal_balance' => '', // Leave blank for totals row
            'description' => '', // Leave blank for totals row
        ];

        // Store amortization table in a public property for Livewire model bindings
        $this->amortization_table = $amortization_table;

        // Calculate total repayment amount
        $this->total_repayment_amount = number_format($total_due, 2);
    } catch (\Throwable $th) {
        dd($th);
    }
}


Released	Maturity	Repayment	Principal	Interest	Fees (Non Deduct)	Due
10/04/2024	10/08/2024	Monthly	5,000.00	60.00	0	5,060.00
You can edit the below fields. The amounts will automatically update below.
#	DueDate	Principal Amount		Interest Amount		Fee Amount		Penalty Amount		Due Amount	Principal Balance	Description
1
10/05/2024
0
+
15.00
Set Default	+
0
Set Default	+
0
Set Default	=
15.00
5000
Repayment
Set Default
2
10/06/2024
0
+
15.00
+
0
+
0
=
15.00
5000
Repayment
3
10/07/2024
0
+
15.00
+
0
+
0
=
15.00
5000
Repayment
4
10/08/2024
5000.00
+
15.00
+
0
+
0
=
5015.00
0
Maturity
Total
5000
+
60
+
0
+
0
=
5060
You can use this page to calculate the loan value in case of customer inquiries. To add a loan into the system, visit Loans(left menu) → Add Loan.

Loan Product
grz
Loan Terms:
Principal:

Principal Amount
5,000
Loan Release Date
10/04/2024
Interest:

Interest Method
Interest-Only
Interest Type
I want Interest to be percentage % based
I want Interest to be a fixed amount Per Cycle
Loan Interest %
0.3

Per Month
Duration:

Loan Duration
4

Months
Repayments:

Repayment Cycle
Monthly
Number of Repayments
4
