<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Mobile;
use Illuminate\Http\Request;

class MobileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mobiles = Mobile::orderBy('id', 'desc')->paginate(10);

		return view('mobiles.index', compact('mobiles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('mobiles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$mobile = new Mobile();

		$mobile->name = $request->input("name");

		$mobile->save();

		return redirect()->route('mobiles.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$mobile = Mobile::findOrFail($id);

		return view('mobiles.show', compact('mobile'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mobile = Mobile::findOrFail($id);

		return view('mobiles.edit', compact('mobile'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$mobile = Mobile::findOrFail($id);

		$mobile->name = $request->input("name");

		$mobile->save();

		return redirect()->route('mobiles.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$mobile = Mobile::findOrFail($id);
		$mobile->delete();

		return redirect()->route('mobiles.index')->with('message', 'Item deleted successfully.');
	}

}
