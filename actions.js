jQuery(document).ready(function($) {
 	var options_simple_mortgage_calc = { 
		target:        '#result_simple_mortgage_calc'
		}; 

  $('#simple_mortgage_calc_form').validate({
		rules: {
			monthly_mortgage_simple_mortgage_calc: {
				required: true,
				number: true,
				min: 100
			},
			rate_simple_mortgage_calc: {
				required: true,
				number: true,
				max: 30
			},
			years_simple_mortgage_calc: {
				required: true,
				number: true,
				max: 30
			}
		},
		submitHandler: function(form) {
			$('#simple_mortgage_calc_form').ajaxSubmit(options_simple_mortgage_calc);
		}	
	});
	
	var options_simple_mortgage_calc_widget = { 
		target:        '#result_simple_mortgage_calc_widget'
		}; 

  $('#simple_mortgage_calc_form_widget').validate({
		rules: {
			monthly_mortgage_simple_mortgage_calc: {
				required: true,
				number: true,
				min: 100
			},
			rate_simple_mortgage_calc: {
				required: true,
				number: true,
				max: 30
			},
			years_simple_mortgage_calc: {
				required: true,
				number: true,
				max: 30
			}
		},
		submitHandler: function(form) {
			$('#simple_mortgage_calc_form_widget').ajaxSubmit(options_simple_mortgage_calc_widget);
		}	
	});
});
