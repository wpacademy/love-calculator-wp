<?php
/**
 * The template for displaying all pages.
 *
 * Template Name: Love Calculator
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

    <div id="primary" <?php astra_primary_class(); ?>>

		<div class="calculator-form">
            <h1>Love Calculator</h1>
            <div id="error"></div>
            <div class="form-fields">
                <div class="input-fields">
                    <input type="text" name="name" id="name" placeholder="Your Name" value="Asad">
                    <input type="text" name="sname" id="sname" placeholder="Partner's Name" value="Huma">
                </div>
                <div class="submit-btn">
                    <button onclick="loveCalculator()" class="button">Calculate Love</button>
                </div>
            </div>
            
        </div>
        <div class="love-result">
            <div id="value"></div>
            <div id="message"></div>
        </div>
	</div><!-- #primary -->
    <script>
        function loveCalculator(){
            var name = document.getElementById('name').value;
            var sname = document.getElementById('sname').value;
            if(name == "" || sname == ""){
                jQuery('#error').html("<span>Please enter your name and partner's name</span>");
            } else{
                jQuery('#error').fadeOut();
                const settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": "https://love-calculator.p.rapidapi.com/getPercentage?sname="+sname+"&fname="+name,
                    "method": "GET",
                    "headers": {
                        "X-RapidAPI-Key": "a71322d35amshdf8ed9e865770a9p15a4afjsn47c9a28a3c64",
                        "X-RapidAPI-Host": "love-calculator.p.rapidapi.com"
                    }
                };

                jQuery.ajax(settings).done(function (response) {
                    var percent = response.percentage;
                    var message = response.result;
                    var heart_image = "heart_red.png";
                    var border_color = "#ededed";
                    if(percent <= 50) {
                        heart_image = "heart_grey.png";
                    } else if(percent > 50 && percent <= 70) {
                        border_color = "#f5b041";
                        heart_image = "heart_orange.png";
                    } else if(percent > 70) {
                        border_color = "#da2b2b";
                        heart_image = "heart_red.png";
                    }

                    jQuery(".calculator-form").hide();
                    jQuery(".love-result").attr("style", "border-color: "+border_color+";");
                    jQuery(".love-result").fadeIn();
                    jQuery('#value').attr("style", "background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/"+heart_image+")");
                    jQuery('#value').html(percent);
                    jQuery('#value').each(function () {
                        jQuery(this).prop('Counter',0).animate({
                            Counter: jQuery(this).text()
                        }, {
                            duration: 1000,
                            easing: 'swing',
                            step: function (now) {
                                jQuery(this).text(Math.ceil(now));
                            }
                        });
                    });
                    jQuery('#message').html(message);
                });
            }
            
        }
        
    </script>
<?php get_footer(); ?>
