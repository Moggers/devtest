<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Property;

use DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		return view('property');
    }

	public function search(Request $request)
	{
		//return response()->json(['name' => 'memes']);
		$query = DB::table("properties");
		if( $request->name != "" ) {
			$query = $query->where("name", "LIKE", "%".$request->name."%" );
		} if( $request->bedrooms!= ""){
			$query = $query->where("bedrooms", $request->bedrooms);
		} if( $request->bathrooms != "" ) {
			$query = $query->where("bathrooms", $request->bathrooms);
		} if( $request->storeys != "" ) {
			$query = $query->where("storeys", $request->storeys);
		} if( $request->garages != "" ) {
			$query = $query->where("garages", $request->garages);
		} if( $request->minprice != "" ) {
			$query = $query->where("price", ">", $request->minprice);
		} if( $request->maxprice != "" ) {
			$query = $query->where("price", "<", $request->maxprice);
		}
		return response()->json($query->get()
		);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
