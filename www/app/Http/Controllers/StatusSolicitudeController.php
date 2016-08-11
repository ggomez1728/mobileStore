<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\StatusSolicitude;
use Illuminate\Http\Request;

class StatusSolicitudeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$status_solicitudes = StatusSolicitude::orderBy('id', 'asc')->paginate(20);

		return view('status_solicitudes.index', compact('status_solicitudes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('status_solicitudes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$status_solicitude = new StatusSolicitude();

		$status_solicitude->title = $request->input("title");
        $status_solicitude->info = $request->input("info");

		$status_solicitude->save();

		return redirect()->route('status_solicitudes.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$status_solicitude = StatusSolicitude::findOrFail($id);

		return view('status_solicitudes.show', compact('status_solicitude'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$status_solicitude = StatusSolicitude::findOrFail($id);

		return view('status_solicitudes.edit', compact('status_solicitude'));
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
		$status_solicitude = StatusSolicitude::findOrFail($id);

		$status_solicitude->title = $request->input("title");
        $status_solicitude->info = $request->input("info");

		$status_solicitude->save();

		return redirect()->route('status_solicitudes.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$status_solicitude = StatusSolicitude::findOrFail($id);
		$status_solicitude->delete();

		return redirect()->route('status_solicitudes.index')->with('message', 'Item deleted successfully.');
	}

}
