<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;

class cornRoute extends Controller {

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
		$nameArray = array(
			'автобус',
			'троллейбус',
			'трамвай'
		);
		$wayArray = array(
			'Чехова',
			'Пушкина',
			'Герцена',
			'Ленина'
		);

		

		for ($i=0; $i < 60; $i++) { 
			sleep(7);
			DB::table('transport_info')->where('date', '<', time()-2*60)->where('minput', 0)->delete();
			DB::table('transport_info')->insert(
				['name' => $nameArray[rand(0, Count($nameArray)-1)], 'number' => rand(1, 100), "date" => time(), "way" => $wayArray[rand(0, Count($wayArray)-1)], "minput" => 0]
			);
		}
		
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
