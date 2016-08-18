<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Client;
use App\Solicitude;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller {


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
		$clients = Client::orderBy('id', 'desc')->paginate(20);

		return view('clients.index', compact('clients'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clients.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$client = new Client();

		$client->identify = $request->input("identify");
        $client->first_name = ucfirst($request->input("first_name"));
        $client->last_name = ucfirst($request->input("last_name"));
        $client->phone_number = $request->input("phone_number");
        $client->email = $request->input("email");

		$client->save();

		return redirect()->route('clients.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$client = Client::findOrFail($id);
		$solicitudes = Solicitude::where('id_client',$id)->orderBy('updated_at', 'desc')->paginate(10);
		$qrCode = "BEGIN:VCARD
VERSION:3.0
PRODID:-//Apple Inc.//iOS 8.1.2//EN
N:". $client->last_name . ";". $client->first_name . ";;;
FN:". $client->first_name . " ". $client->last_name ."
ORG:".$client->id.";
EMAIL;type=INTERNET;type=WORK;type=pref:". $client->email . "
TEL;type=HOME;type=VOICE;type=pref:". $client->phone_number ."
REV:2015-04-22T19:51:10Z
END:VCARD";
		return view('clients.show', compact('client', 'solicitudes', 'qrCode'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client = Client::findOrFail($id);

		return view('clients.edit', compact('client'));
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
		$client = Client::findOrFail($id);

		$client->identify = $request->input("identify");
        $client->first_name = ucfirst($request->input("first_name"));
        $client->last_name = ucfirst($request->input("last_name"));
        $client->phone_number = $request->input("phone_number");
        $client->email = $request->input("email");
		$client->save();
		return redirect()->route('clients.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$client = Client::findOrFail($id);
		$client->delete();

		return redirect()->route('clients.index')->with('message', 'Item deleted successfully.');
	}

	public function search(Request $request)
	{

		$filter['search'] = $request->search;
		$filter['dataSearch'] = $request->dataSearch;

		if ($request->search == "id"){
			$clients = Client::where('id', 'like', $request->dataSearch . "%")->orderBy('id', 'asc')->paginate(20);
		}
		else if ($request->search == "first_name"){
			$clients = Client::where('first_name', 'like', $request->dataSearch . "%")->orderBy('id', 'asc')->paginate(20);
		}
		else if ($request->search == "last_name"){
			$clients = Client::where('last_name', 'like', $request->dataSearch . "%")->orderBy('id', 'asc')->paginate(20);
		}
		else if ($request->search == "phone"){
			$clients = Client::where('phone_number', 'like', "%" .$request->dataSearch . "%")->orderBy('id', 'asc')->paginate(20);
		}
		else if ($request->search == "email"){
			$clients = Client::where('email', 'like', $request->dataSearch . "%")->orderBy('id', 'asc')->paginate(20);
		}
		$clients->appends($filter);
		return view('clients.index', compact('clients', $request));


	}

	public function backup(){
		$clients = Client::orderBy('id', 'asc');
		return view('clients.backup', compact('clients'));
	}

	public function generate(){

		$clients = Client::all();
		$vcards = "";
		foreach($clients as $client){
			$vcard =  "BEGIN:VCARD
VERSION:3.0
PRODID:-//Apple Inc.//iOS 8.1.2//EN
N:". $client->last_name . ";". $client->first_name . ";;;
FN:". $client->first_name . " ". $client->last_name ."
ORG:".$client->id.";
EMAIL;type=INTERNET;type=WORK;type=pref:". $client->email . "
TEL;type=HOME;type=VOICE;type=pref:". $client->phone_number ."
REV:2015-04-22T19:51:10Z
END:VCARD \n";
			$vcards = $vcards .$vcard;
		}
		$mytime = Carbon::now();
		$myName = "Backup-".$mytime.".vcf";
		$headers = ['Content-type'=>'text/plain', 'test'=>'YoYo', 'Content-Disposition'=>sprintf('attachment; filename="%s"', $myName),'X-BooYAH'=>'WorkyWorky','Content-Length'=>sizeof($vcards)];

		return \Response::make($vcards, 200, $headers);
	}

}
