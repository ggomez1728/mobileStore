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
		$solicitudes = Solicitude::orderBy('id', 'desc')->paginate(20);
		$status_solicitudes = StatusSolicitude::all();
		$mobiles = Mobile::all();

		return view('solicitudes.index', compact('solicitudes', 'status_solicitudes', 'mobiles'));
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
		$quantyStatus = StatusSolicitude::all()->count();
		if($solicitude->status < $quantyStatus){
			$nextStatus = StatusSolicitude::findOrFail($solicitude->status+1);
		}
		return view('solicitudes.show', compact('solicitude', 'nextStatus'));
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

	public function updateStatus(Request $request, $id, $status)
	{
		$solicitude = Solicitude::findOrFail($id);
		$solicitude->status = $status;
		$solicitude->save();
		return redirect()->route('solicitudes.show', $solicitude->id)->with('message', 'Item updated successfully.');

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

	public function search(Request $request)
	{
		$status_solicitudes = StatusSolicitude::all();
		$mobiles = Mobile::all();
		if ($request->mobile != null){
			$filter['mobile'] = $request->mobile;
		}
		if ($request->status != null){
			$filter['status'] = $request->status;
		}
		if ($request->date_from != null){
			$filter['date_from'] = $request->date_from;
		}
		if ($request->date_to != null){
			$filter['date_to'] = $request->date_to;
		}
		if($request->date_from != null ){
			$date_to = $request->date_to;
			if($date_to == null){
				$date_to = $request->date_from;
			}
			$solicitudes = Solicitude::whereBetween('created_at', [$request->date_from, $date_to])->orderBy('id', 'asc')->paginate(20);
			return view('solicitudes.index', compact('solicitudes', 'status_solicitudes', 'mobiles'));
		}
		if ($request->mobile != null ||  $request->status != null ||  $request->date_from != null){
			$solicitudes = Solicitude::where('mobile', 'like', $request->mobile . "%")->where('status', 'like', "%".$request->status ."%")->orderBy('id', 'asc')->paginate(20);
			$solicitudes->appends($filter);

			return view('solicitudes.index', compact('solicitudes', 'status_solicitudes', 'mobiles'));
		}

		return redirect()->route('solicitudes.index')->with('message', 'Item updated successfully.');
	}
}
