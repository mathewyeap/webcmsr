<?php

// Helper class

class H {

	public static function colourIsDark($hexColour) {
		$hexColour = ltrim($hexColour, '#');
		$r = hexdec(substr($hexColour, 0, 2));
		$g = hexdec(substr($hexColour, 2, 2));
		$b = hexdec(substr($hexColour, 4, 2));
		$luma = (0.2126 * $r + 0.7152 * $g + 0.0722 * $b) / 255;

		return $luma <= 0.5;
	}

	public static function previousUrl($alternative = null)
	{
		$url = URL::previous();
		
		return ! empty($url) ? $url : $alternative;
	}
}
