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


web


<script>

const axios = require('axios');

// API endpoint URL
const apiUrl = 'https://admin.mightyfinance.co.zm/api/calculate-reducing-balance';

// Assume data is available in this context as an object containing the necessary values
const data = {
    loan_duration_period: 'month',
    loan_duration_value: 3, //tenure
    principal: 1000,
    loan_interest_value: 5, //interest rate
    num_of_repayments: 3,
    release_date: '2023-01-01'
};

// Prepare request data
const requestData = {
    loan_duration_period: data.loan_duration_period,
    loan_duration_value: data.loan_duration_value,
    principal: data.principal,
    loan_interest_value: data.loan_interest_value,
    minimum_num_of_repayments: data.num_of_repayments,
    release_date: data.release_date
};

// Make a POST request
axios.post(apiUrl, requestData, {
    headers: {
        'Content-Type': 'application/json'
    }
})
.then(response => {
    // Handle success
    console.log(response.data);
})
.catch(error => {
    // Handle error
    if (error.response) {
        // Server responded with a status other than 200 range
        console.error("Error response:", error.response.data);
    } else if (error.request) {
        // The request was made but no response was received
        console.error("Error request:", error.request);
    } else {
        // Something happened in setting up the request that triggered an Error
        console.error("Error message:", error.message);
    }
});

</script>
