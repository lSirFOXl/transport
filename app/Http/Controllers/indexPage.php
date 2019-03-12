<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;

class indexPage extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	function __construct() {
		$this->logInfo(__CLASS__);
	}

	public function index()
	{
		DB::enableQueryLog();
		$transport_info = DB::table('transport_info')->select('*')->orderBy('date', 'desc')->get();
		return view('index', ["transport_info" => $transport_info]);
		
	}

	

	public function redirect(){
		return redirect('/index.html');
	}

	public function getNewInfo(Request $request){
		$val = DB::table('transport_info')->select('name', 'number', 'date', 'way')->where('date', '>', $request->time)->get();
		foreach ($val as $key => $value) {
			$value->date = date("d.m.y, H:i:s", $value->date);
		}
		$response = array(
			'info' => $val,
			'date' => time()
		);

		return response()->json($response); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
