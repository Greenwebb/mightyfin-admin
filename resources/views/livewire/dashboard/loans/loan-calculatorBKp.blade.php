<div class="container">

    <div class="content-body">
        <form id="form">
            <input type="hidden" name="loan_calculator" value="1">
            
            <p>You can use this page to calculate the loan value in case of customer inquiries.</p>
            
            <div>
                <p><b>Principal:</b></p>
                <label for="inputLoanPrincipalAmount">Principal Amount</label>                      
                <input type="text" name="loan_principal_amount" id="inputLoanPrincipalAmount" required="">
                
        
            </div>
            
            <hr>
            
            <div>
                <p><b>Interest:</b></p>
                <label for="inputLoanInterestMethod">Interest Method</label>                      
                <select name="loan_interest_method" id="inputLoanInterestMethod" required="">
                    <option value="flat_rate">Flat Rate</option>
                    <option value="reducing_rate_equal_installments">Reducing Balance - Equal Installments</option>
                    <option value="reducing_rate_equal_principal">Reducing Balance - Equal Principal</option>
                    <option value="interest_only">Interest-Only</option>
                    <option value="compound_interest">Compound Interest</option>
                </select>
                
                <label for="inputLoanInterest">Loan Interest %</label>                      
                <input type="text" name="loan_interest" id="inputLoanInterest" placeholder=" %" required="">
                
                <select name="loan_interest_period" id="inputInterestPeriod" required="">
                    <option value="Day">Per Day</option>
                    <option value="Week">Per Week</option>
                    <option value="Month">Per Month</option>
                    <option value="Year">Per Year</option>
                </select>
            </div>
            
            <hr>
            
            <div>
                <p><b>Duration:</b></p>
                <label for="inputLoanDuration">Loan Duration</label>                      
                <input type="text" name="loan_duration" id="inputLoanDuration" value="12" required="" min="1" max="2000">
                
                <select name="loan_duration_period" id="inputLoanDurationPeriod" required="">
                    <option value="Days">Days</option>
                    <option value="Weeks">Weeks</option>
                    <option value="Months">Months</option>
                    <option value="Years">Years</option>
                </select>
            </div>
            
            <hr>
            
            <div>
                <p><b>Repayments:</b></p>
                <label for="inputLoanPaymentSchemeId">Repayment Cycle</label>
                <select name="loan_payment_scheme_id" id="inputLoanPaymentSchemeId" required="">
                    <option value="6">Daily</option>
                    <option value="4">Weekly</option>
                    <option value="9">Biweekly</option>
                    <option value="3">Monthly</option>
                    <option value="12">Bimonthly</option>
                    <option value="13">Quarterly</option>
                    <option value="781">Every 4 Months</option>
                    <option value="14">Semi-Annual</option>
                    <option value="1943">Every 9 Months</option>
                    <option value="11">Yearly</option>
                </select>
                
                <label for="inputLoanNumOfRepayments">Number of Repayments</label>                      
                <input type="text" name="loan_num_of_repayments" id="inputLoanNumOfRepayments" required="" min="1" max="2000">
            </div>
            
            <hr>
            
            <button  type="button" onclick="resetForm()">Reset</button>
            <button type="submit">Calculate</button>
        </form>
    </div>

</div>x
