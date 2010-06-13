<?php
/**
 * @package Fireflies
 * @author T.J. Barber
 * @version 1.1
 */
/*
Plugin Name: Fireflies
Plugin URI: http://www.winworldblog.com/
Description: This plug-in is yet another plug-in inspired by the famous "Hello Dolly" plugin that comes standard in WordPress. Instead of Hello Dolly, this plug-in displays Owl City's popular song <cite>Fireflies</cite> in the upper right of your admin screen on every page. Created by T.J. Barber from The Windows World Blog.
Author: T.J. Barber
Version: 1.1
Author URI: http://www.winworldblog.com/
*/

function fireflies_get_lyric() {
	/** lyrics to Fireflies go here. Thanks Adam Young! ^_^ */
	$lyrics = "You would not believe your eyes
If ten million Fireflies
Lit up the world as I fell asleep
Cause they fill the open air
And leave teardrops everywhere
You'd think me rude
But I would just stand and stare
I'd like to make myself believe
That planet earth turns slowly
It's hard to say that I'd rather stay
Awake when I'm asleep
Cause everything is never as it seems
Cause I'd get a thousand hugs
From ten thousand lightning bugs
As they tried to teach me how to dance
A foxtrot above my head
A sockhop beneath my bed
A disco ball is just hanging by a thread
I'd like to make myself believe 
That planet earth turns slowly
It's hard to say that I'd rather stay 
Awake when I'm asleep
Cause everything is never as it seems
When I fall asleep";

	$lyrics = explode("\n", $lyrics);
	return wptexturize( $lyrics[ mt_rand(0, count($lyrics) - 1) ] );

}

// This just echoes the chosen line, we'll position it later
function fireflies() {
	$chosen = fireflies_get_lyric();
	echo "<p id='fireflies'>$chosen</p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'fireflies');

// We need some CSS to position the paragraph
function fireflies_css() {
	// This makes sure that the posinioning is also good for right-to-left languages
	$x = ( 'rtl' == get_bloginfo( 'text_direction' ) ) ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#fireflies {
		position: absolute;
		top: 4.5em;
		margin: 0;
		padding: 0;
		$x: 215px;
		font-size: 11px;
	}
	</style>
	";
}

add_action('admin_head', 'fireflies_css');

?>
