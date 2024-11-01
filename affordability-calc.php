<?php 
/*
Plugin Name: Simple Affordability Calculator
Plugin URI: http://wpcream.com/free-plugins/affordability-calculator.php
Description: Do you need WordPress Support? Check out <strong>FixMyWP.com <a href="http://fixmywp.com">WordPress Repair Services</a></strong>. Simple Mortgage and Loan Affordability Calculator [affordability-calc]. More <a href="http://wpcream.com">WordPress Mortgage and Loan Calculators</a>.
Version: 1.11
Author: wpcream
Author URI: http://wpcream.com
License: GPL2
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

function generate_simple_mortgage_calc($text){
	$x = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)); 
	
	$html_code="
	<div id='mortgage_calc_content_simple_mortgage_calc'>
		<div id='mortgage_calc_content_inner_simple_mortgage_calc'>
			<form id='simple_mortgage_calc_form' method='post' action='".$x."mortgage-calc.php'>
				<div class='mortgage_item_simple_mortgage_calc'>Monthly mortgage: <br /><input type='text' value='' name='monthly_mortgage_simple_mortgage_calc' id='monthly_mortgage_simple_mortgage_calc' class='mortgage-values_simple_mortgage_calc'/></div> 
				<div class='mortgage_item_simple_mortgage_calc'>Interest rate: <br /><input type='text' value='' name='rate_simple_mortgage_calc' id='rate_simple_mortgage_calc' class='mortgage-values_simple_mortgage_calc'/> </div>
				<div class='mortgage_item_simple_mortgage_calc'>Years: <br /><input type='text' value='' name='years_simple_mortgage_calc' id='years_simple_mortgage_calc' class='mortgage-values_simple_mortgage_calc' /></div>
				<div class='clear'></div>
			<center><input type='submit' value='Calculate' id='mortgage_submit_simple_mortgage_calc'/></center>
			</form>
			<div id='result1_simple_mortgage_calc'><center><div id='result_simple_mortgage_calc'></div></center></div>
		</div>
	</div>
	
	";
	
	$text = str_replace('[affordability-calc]', $html_code, $text);
	return $text;
}

function generate_simple_mortgage_calc_widget(){
	$x = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)); 
	
	$html_code="
	<div id='mortgage_calc_content_simple_mortgage_calc'>
		<div id='mortgage_calc_content_inner_simple_mortgage_calc'>
			<form id='simple_mortgage_calc_form_widget' method='post' action='".$x."mortgage-calc.php'>
				<div class='mortgage_item_simple_mortgage_calc'>Monthly mortgage: <br /><input type='text' value='' name='monthly_mortgage_simple_mortgage_calc' id='monthly_mortgage_simple_mortgage_calc' class='mortgage-values_simple_mortgage_calc'/></div> 
				<div class='mortgage_item_simple_mortgage_calc'>Interest rate: <br /><input type='text' value='' name='rate_simple_mortgage_calc' id='rate_simple_mortgage_calc' class='mortgage-values_simple_mortgage_calc'/> </div>
				<div class='mortgage_item_simple_mortgage_calc'>Years: <br /><input type='text' value='' name='years_simple_mortgage_calc' id='years_simple_mortgage_calc' class='mortgage-values_simple_mortgage_calc' /></div>
				<div class='clear'></div>
			<center><input type='submit' value='Calculate' id='mortgage_submit_simple_mortgage_calc'/></center>
			</form>
			<div id='result1_simple_mortgage_calc'><center><div id='result_simple_mortgage_calc_widget'></div></center></div>
		</div>
	</div>
	
	";

	return $html_code;
}


function widget_affordability($args) {
	//apply_filters('widget_title', 'Affordability Calculator');
	extract( $args );
	$title = 'Affordability Calculator';
?>
	<?php echo $before_widget; ?>
			<?php if ( $title )
						echo $before_title . $title . $after_title; ?>
			<?php echo generate_simple_mortgage_calc_widget(); ?>
	<?php echo $after_widget; ?>

<?php
}


function affordability_init()
{
	
  register_sidebar_widget(__('Affordability Calculator'), 'widget_affordability');
}
add_action("plugins_loaded", "affordability_init");


wp_enqueue_style('affordability-css', '/wp-content/plugins/affordability-calc/style.css');
wp_enqueue_script( 'affordability-validator', '/wp-content/plugins/affordability-calc/jquery.validate.js', array( 'jquery' ));
wp_enqueue_script( 'affordability-action', '/wp-content/plugins/affordability-calc/actions.js', array( 'jquery-form',));


add_filter('the_content', 'generate_simple_mortgage_calc');
add_filter('widget_content', 'generate_simple_mortgage_calc');

?>