<?php 
setlocale(LC_MONETARY, 'en_US');
$monthly_mortgage = $_REQUEST['monthly_mortgage_simple_mortgage_calc'];
$rate = $_REQUEST['rate_simple_mortgage_calc'];
$years = $_REQUEST['years_simple_mortgage_calc'];

$i = ($rate/100)/12;
$months = 12*$years;
$z = pow((1+$i),$months);

$loan = round(($monthly_mortgage *($z-1))/($i*$z));//*100)/100;

$orig_loan = $loan;

$total_interest = $current_principal_paid = 0;

for ($j=0; $j<$months;$j++){// ($loan > 0){
	$mort_array = array();
	
	$current_interest = round(($loan * $i)*100)/100;
	
	$mortgage = $monthly_mortgage;
	
	$mortgage = round($mortgage*100)/100;
	if ($loan < $mortgage) $mortgage = $loan+$current_interest;		
	
	$total_interest = round(($total_interest + $current_interest)*100)/100;
	$current_principal_paid = round(($mortgage - $current_interest)*100)/100;
	
	if (($loan - $current_principal_paid) < 0) {
		$loan = 0;
	}
	else {
		$loan = round(($loan - $current_principal_paid)*100)/100;
	}

	$mort_array['month'] = $current_month.' '.$current_year;
	$mort_array['mortgage'] =  number_format($mortgage,2,'.',',');
	$mort_array['current_principal_paid'] = $current_principal_paid;// number_format($current_principal_paid,2,'.',',');
	$mort_array['current_interest'] = number_format($current_interest,2,'.',',');
	$mort_array['total_interest'] = number_format($total_interest,2,'.',',');
	$mort_array['loan'] =  number_format($loan,2,'.',',');
	
	$mortgages[] = $mort_array;
	
}

$orig_loan_display = number_format($orig_loan,2,'.',',');
$total_interest_display = number_format(round($total_interest),2,'.',',');
$total_paid =  number_format(round($orig_loan+$total_interest),2,'.',',');
/* $response = "<table>
							<tr>
								<td>Paid total</td><td>Paid Interest</td><td>Maximum loan</td>
							</tr>
							<tr>
								<td>$ $total_paid</td><td>$ $total_interest_display</td><td>$ $orig_loan_display</td>
							</tr>
						</table>"; */
						
$response = "<table>
							<tr><td>Paid total</td></tr>
							<tr><td>$ $total_paid</td></tr>
							<tr><td>Paid Interest</td></tr>
							<tr><td>$ $total_interest_display</td></tr>
							<tr><td>Maximum loan</td></tr>
							<tr><td>$ $orig_loan_display</td></tr>
						</table>";

echo $response;
?>