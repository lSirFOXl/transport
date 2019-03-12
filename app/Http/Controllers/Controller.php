<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

	
	use DispatchesCommands, ValidatesRequests;

	

	public function logInfo($controller){
		$fw = fopen($_SERVER['DOCUMENT_ROOT']."/../logs.log", "a+");
		fwrite($fw, "[PAGE]"."[".date(DATE_RFC822)."]"."[".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."] "."controller: ".$controller." \r\n");
		fclose($fw);
	}


}
