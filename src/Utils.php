<?php
namespace Src;

class Utils {
	public static function console_log($data) {
		$output = $data;
		if (is_array($output)) {
			$output = implode(',', $output);
		}

		echo "<script>console.log('Debug objects: " . $output . "');</script>";
	}
}