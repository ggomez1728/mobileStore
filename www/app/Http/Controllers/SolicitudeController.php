<?php namespace App\Http\Controllers;

use App\Client;
use App\Feature;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Solicitude;
use App\Mobile;

use App\StatusSolicitude;
use Illuminate\Http\Request;

class SolicitudeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$solicitudes = Solicitude::orderBy('id', 'desc')->paginate(10);
		return view('solicitudes.index', compact('solicitudes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$client = Client::findOrFail($request['user']);
		$mobiles = Mobile::all();
		$features = Feature::all();

		$status_solicitudes = StatusSolicitude::all();
		return view('solicitudes.create', compact('mobiles', 'status_solicitudes', 'client', 'features'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{


		$solicitude = new Solicitude();
		$solicitude->mobile = $request->input("mobile");
        $solicitude->status = $request->input("status");
        $solicitude->id_client = $request->input("id_client");
        $solicitude->fails = $request->input("fails");
        $solicitude->others = $request->input("others");
		$solicitude->save();
		if($request->features != null){
			$solicitude->features()->sync($request->features);
		}
		else{
			$solicitude->features()->sync([]);
		}
		return redirect()->route('clients.show', $solicitude-> id_client)->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$solicitude = Solicitude::findOrFail($id);

		return view('solicitudes.show', compact('solicitude'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$solicitude = Solicitude::findOrFail($id);
		$mobiles = Mobile::all();
		$features = Feature::all();
		$status_solicitudes = StatusSolicitude::all();

		$features_check = $solicitude->features;
		return view('solicitudes.edit', compact('solicitude', 'mobiles', 'features', 'features_check', 'status_solicitudes'));
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
		$solicitude = Solicitude::findOrFail($id);

		$solicitude->mobile = $request->input("mobile");
        $solicitude->status = $request->input("status");
        $solicitude-> id_client = $request->input("id_client");
        $solicitude-> fails = $request->input("fails");
        $solicitude->others = $request->input("others");

		$solicitude->save();
		if($request->features != null){
			$solicitude->features()->sync($request->features);
		}
		else{
			$solicitude->features()->sync([]);
		}
		return redirect()->route('clients.show', $solicitude-> id_client)->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$solicitude = Solicitude::findOrFail($id);
		$solicitude->delete();

		return redirect()->route('solicitudes.index')->with('message', 'Item deleted successfully.');
	}

}
