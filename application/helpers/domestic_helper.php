<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @param array - array of assoc arrays to search from
 * @param index - array index to locate from
 * $param value - value you are searching for
 */
		

if(!function_exists('get_youtube_id')){
	function get_youtube_id($url){
		$vid = FALSE;
		$vid_arr = explode('/watch?v=', $url);

		if(!isset($vid_arr[1])){
			$vid_arr = explode('.be/', $url);	
		}

		$vid = $vid_arr[1];

		return $vid;
	}
}

if(!function_exists('get_youtube_newurl')){
	function get_youtube_newurl($url){
		$vid = FALSE;
		$vid_arr = explode('/watch?v=', $url);

		if(!isset($vid_arr[1])){
			$vid_arr = explode('.be/', $url);	
		}

		$vid = $vid_arr[1];

		return 'http://www.youtube.com/v/' . $vid;
	}
}	

if(!function_exists('get_youtube_img')){
	function get_youtube_img($youtube_id){
		return "http://img.youtube.com/vi/".$youtube_id."/0.jpg";
	}
}

if(!function_exists('array_to_csv')){
	function array_to_csv($array, $download = "")
	{
		if ($download != "")
		{	
			header('Content-Type: application/csv');
			header('Content-Disposition: attachement; filename="' . $download . '"');
		}		

		ob_start();
		$f = fopen('php://output', 'w') or show_error("Can't open php://output");
		$n = 0;		
		foreach ($array as $line)
		{
			$n++;
			if ( ! fputcsv($f, $line))
			{
				show_error("Can't write line $n: $line");
			}
		}
		fclose($f) or show_error("Can't close php://output");
		$str = ob_get_contents();
		ob_end_clean();

		if ($download == "")
		{
			return $str;	
		}
		else
		{	
			echo $str;
		}		
	}
}	

if(!function_exists('pre')){
	function pre($var){
	    echo '<pre>';
	    
	    if(is_array($var)) {
	      	print_r($var);
	    }else{
	      	var_dump($var);
	    }

	    echo '</pre>'; exit;
	}
}	  
/* End of file yoda_helper.php */
/* Location: ./application/helper/yoda_helper.php */