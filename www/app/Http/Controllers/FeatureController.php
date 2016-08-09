<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$features = Feature::orderBy('id', 'asc')->paginate(20);

		return view('features.index', compact('features'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('features.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$feature = new Feature();

		$feature->name = $request->input("name");

		$feature->save();

		return redirect()->route('features.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$feature = Feature::findOrFail($id);

		return view('features.show', compact('feature'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$feature = Feature::findOrFail($id);

		return view('features.edit', compact('feature'));
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
		$feature = Feature::findOrFail($id);

		$feature->name = $request->input("name");

		$feature->save();

		return redirect()->route('features.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$feature = Feature::findOrFail($id);
		$feature->delete();

		return redirect()->route('features.index')->with('message', 'Item deleted successfully.');
	}

}
