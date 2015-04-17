<?php

// Errors and Messages
define('EAM_ERROR', 'error');
define('EAM_WARNING', 'warning');
define('EAM_NOTICE', 'notice'); 

// Data format
define('DATA_FORMAT_TEXT', 'Text');
define('DATA_FORMAT_TITLE', 'Title');
define('DATA_FORMAT_NAME', 'Name');
define('DATA_FORMAT_URL', 'URL');
define('DATA_FORMAT_FILE', 'File');
define('DATA_FORMAT_DIR', 'Dir');
define('DATA_FORMAT_DIR_FILE', 'Dir_File');
define('DATA_FORMAT_LETTERS', 'Letters');
define('DATA_FORMAT_NUMBERS', 'Numbers');
define('DATA_FORMAT_LETTERS_AND_NUMBERS', 'LettersAndNumbers');
define('DATA_FORMAT_SEO', 'SEO');
define('DATA_FORMAT_TAG', 'TAG');
define('DATA_FORMAT_DATE', 'DATE');
define('DATA_FORMAT_NAME_WITH_SPECIAL_CHARS', 'NameWithSpecialChars');
define('DATA_FORMAT_VAR', 'VariableName');

class Helpers {
	
	public static function dataFormat($data, $format = DATA_FORMAT_TEXT) {
// 		if (strlen($data) == 0) {
// 			return $data;
// 		}
		$data = trim($data);
		switch ($format) {
			case DATA_FORMAT_NAME: {
				$data = preg_replace("/[^a-zA-Z0-9 .-]/", '', $data);
				$data = preg_replace('/^[ ]+/', '', $data);
				$data = preg_replace('/[ ]+$/', '', $data);
				$data = preg_replace('/[ ]+/', ' ', $data);
				$data = preg_replace('/^[\.]+/', '', $data);
				$data = preg_replace('/[\.]+$/', '', $data);
				$data = preg_replace('/[.]+/', '.', $data);
				$data = preg_replace('/-+/', '-', $data);
				$data = preg_replace('/[.][^a-zA-Z0-9]/', '.', $data);
				$data = preg_replace('/[-][^a-zA-Z0-9]/', '-', $data);
			}
			case DATA_FORMAT_TITLE: {
				$data = preg_replace('/[\s]+/', ' ', $data);
				$data = preg_replace('/[ ][,]/', ',', $data);
				break;
			}
			case DATA_FORMAT_NAME_WITH_SPECIAL_CHARS: {
				$data = preg_replace('/^[ ]+/', '', $data);
				$data = preg_replace('/[ ]+$/', '', $data);
				$data = preg_replace('/[ ]+/', ' ', $data);
				$data = preg_replace('/^[\.]+/', '', $data);
				$data = preg_replace('/[\.]+$/', '', $data);
				$data = preg_replace('/[.]+/', '.', $data);
				$data = preg_replace('/-+/', '-', $data);
				$data = preg_replace('/[\s]+/', ' ', $data);
				break;
			}
			
			case DATA_FORMAT_TEXT: {
				$data = preg_replace('/[ ]+/', ' ', $data);
				break;
			}
			
			case DATA_FORMAT_FILE:
			case DATA_FORMAT_DIR:
				setlocale(LC_ALL, 'en_US');
				$data = iconv('UTF-8', 'ASCII//TRANSLIT', $data);
				$data = preg_replace("/[^a-zA-Z0-9 .-]/", '', $data);
				$data = preg_replace("/[.]+/", '-', $data);
			case DATA_FORMAT_DIR_FILE:
			case DATA_FORMAT_URL: {
				setlocale(LC_ALL, 'en_US');
				$data = iconv('UTF-8', 'ASCII//TRANSLIT', $data);
				$data = preg_replace('/\s+/', '-', $data);
				$data = preg_replace('/[\\/]+/', '/', $data);
				$data = preg_replace('/^[\.]+/', '', $data);
				$data = preg_replace('/[\.]+$/', '', $data);
				$data = preg_replace('/[.]+/', '.', $data);
				$data = preg_replace('/-+/', '-', $data);
				$data = preg_replace('/[.][^a-zA-Z0-9]/', '.', $data);
				$data = preg_replace('/[-][^a-zA-Z0-9]/', '-', $data);
				break;
			}
			
			case DATA_FORMAT_LETTERS: {
				setlocale(LC_ALL, 'en_US');
				$data = iconv('UTF-8', 'ASCII//TRANSLIT', $data);
				$data = preg_replace("/[^a-zA-Z]/", '', $data);
				break;
			}
			
			case DATA_FORMAT_NUMBERS: {
				$data = preg_replace("/[^0-9]/", '', $data);
				break;
			}
			
			case DATA_FORMAT_LETTERS_AND_NUMBERS: {
				setlocale(LC_ALL, 'en_US');
				$data = iconv('UTF-8', 'ASCII//TRANSLIT', $data);
				$data = preg_replace("/[^a-zA-Z0-9]/", '', $data);
				break;
			}
			
			case DATA_FORMAT_SEO: {
				setlocale(LC_ALL, 'en_US');
				$data = iconv('UTF-8', 'ASCII//TRANSLIT', $data);
				$data = preg_replace('/&#(\d?)+;/i', '', $data);
				
				$data = str_replace("'", '', $data);
				$data = str_replace("\\'", '', $data);
				
				$data = preg_replace('/(\w)([^\w\s-\/]{1})(\w)/i', '$1$3', $data);
				$data = preg_replace('/(\w)([^\w\s-\/]{1})(\w)/i', '$1$3', $data);
				$data = preg_replace('/(\w)([\s]{1})(\W)(\w)/i', '$1$2$4', $data);
				
				$data = preg_replace('/[.]+/', '', $data);
				$data = preg_replace('/[^a-zA-Z0-9 -]/', '-', $data);
				$data = preg_replace('/\s+/', '-', $data);
				$data = preg_replace('/-+/', '-', $data);
				$data = preg_replace('/^[-]+/', '', $data);
				$data = preg_replace('/[-]+$/', '', $data);
				$data = strtolower($data);
				break;
			}
			
			case DATA_FORMAT_VAR: {
				setlocale(LC_ALL, 'en_US');
				$data = iconv('UTF-8', 'ASCII//TRANSLIT', $data);
				$data = preg_replace('/&#(\d?)+;/i', '', $data);
				$data = preg_replace('/(\w)([^\w\s]{1})(\w)/i', '$1$3', $data);
				$data = preg_replace('/(\w)([^\w\s]{1})(\w)/i', '$1$3', $data);
				$data = preg_replace('/(\w)([\s]{1})(\W)(\w)/i', '$1$2$4', $data);
				
				$data = preg_replace('/[.]+/', '', $data);
				$data = preg_replace('/[^a-zA-Z0-9_]/', '', $data);
				$data = preg_replace('/^[-_]+/', '', $data);
				$data = preg_replace('/[-_]+$/', '', $data);
				break;
			}
			
			case DATA_FORMAT_TAG: {
				setlocale(LC_ALL, 'en_US');
				$data = iconv('UTF-8', 'ASCII//TRANSLIT', $data);
				$data = preg_replace("/[^a-zA-Z0-9 ]/", '', $data);
				$data = preg_replace('/\s+/', ' ', $data);
				$data = strtolower($data);
				break;
			}
			
			case DATA_FORMAT_DATE: {
				$data = preg_replace("/[^0-9 -:]/", '', $data);
				$data = preg_replace('/\s+/', ' ', $data);
				$data = strtolower($data);
				break;
			}
			
			default:
				return false;
				break;
		}
		return $data;
	}
	
	public static function decodeString($value) {
		$value = html_entity_decode($value, ENT_QUOTES, 'UTF-8'); #NOTE: UTF-8 does not work if is not UTF-8!
		if (version_compare(PHP_VERSION, '5.5.0') < 0) {
			$value = preg_replace('/&#(\d+);/me', "chr(\\1)", $value); #decimal notation
			$value = preg_replace('/&#x([a-f0-9]+);/mei', "chr(0x\\1)", $value); #hex notation
		} else {
			$value = preg_replace_callback('/&#(\d+);/m', 
					function ($matches) {
						return "chr({$matches[0]})";
					}, $value);
			$value = preg_replace_callback('/&#x([a-f0-9]+);/mi', 
					function ($matches) {
						return "chr(0x{$matches[0]})";
					}, $value);
		}
		
		return $value;
	}
	
	public static function removeWhitespaces($value) {
		$value = preg_replace('/\s+/', '', $value);
		return $value;
	}
	
	
	
	public static function randomString($length, $withNumbers = true, $withUppercase = true) {
		$key = '';
		$keys = array();
	
		$lowercase = array();
		$uppercase = array();
		$numbers = array();
	
		$lowercase = range('a', 'z');
	
		if ($withUppercase === true)
			$uppercase = range('A', 'Z');
	
		if ($withNumbers === true)
			$numbers = range(0, 9);
	
		$keys = array_merge($lowercase, $uppercase, $numbers);
	
		for ($i = 0; $i < $length; $i++) {
			$key .= $keys[array_rand($keys)];
		}
	
		return $key;
	}
	
	public static function userAgents() {
		$agents = array();
		
		if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'twitter') !== false) {
			$agents["uaTwitter"] = true;
			$agents["twitter"] = true;
		}
		if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'facebook') !== false || strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'facebot') !== false) {
			$agents["uaFacebook"] = true;
			$agents["facebook"] = true;
		}
		if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'google') !== false) {
			$agents["uaGoogle"] = true;
			$agents["google"] = true;
		}
		
		if (count($agents) == 0) return null;
		
		return $agents;
	}
	

}

?>