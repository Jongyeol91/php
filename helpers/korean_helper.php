<?php
date_default_timezone_set('Asia/Seoul');

if (!function_exists('kdate')) {
	function kdate($stamp) {
		return date("o년 n월 j일, G시 i분 s초", strtotime($stamp));
	}
}
