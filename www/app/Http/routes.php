<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function () {
    $pdf = App::make('dompdf.wrapper');
    $customPaper = array(0, 0, 250, 310);
    $squema = '<html>
 <style type="text/css">
 		body{
 			margin: -1cm  -1cm -1cm;
 			font-family: "Roboto", sans-serif;
 		}
		.card {
		    width: 310px;
		    height: 250px;
			text-align: center;
			padding: 0;
			 margin:0px;
		}
		.information {
			width: 160px;
			float: left;
			height: 250px;
			z-index: 100;
			text-align: center;

		}
		.information > img {
		height: 80px;
		margin: 60px 30px 0 20px;
		}
		.information > span{
			font-size: 0.9em;
		}
		.qr {
			width: 210px;
			float: left;
			height: 250px;
			margin: 0 auto;
		}
		.qr > img {
		  	margin-top: -25px;
		  	margin-left: -60px;
		}
		.footer{
			float: left;
			margin: 0 auto;
			height: 67px;
			text-align: center;
		}
		.footer > span:nth-child(1){
			font-size: 1.2em;
		}
		.footer > span:nth-child(2){
			font-size: 1.1em;
		}
		.footer > span:nth-child(3){
			font-size: 0.8em;
		}
	</style>
  <body>
  <div class="card">
		<div class="information">
      		<img class="img-rounded" src="' . asset("/resources/images/logo-hackersquad.png") . '">
			<span>Telf.: +58 251 9352220</span>
		</div><div class="qr">
    		<img src="data:image/png;base64,' . base64_encode(QrCode::format("png")->size(300)->generate("hola")) . '">
		</div>
	</div>
	<div class="footer">
		<span>hackersquad@icloud.com</span>
		<br>
		<span>www.HackerSquad.net</span>
		<br>
		<span>V-20472849-2</span>
	</div>

</body>
</html>
';


    $test = '<table width=100%>
  <tr height=200px>
      <td width =40px>
      <img class="img-rounded" src="' . asset("/resources/images/logo-hackersquad.png") . '" style="height:70px;">

      </td>
    <img class="img-responsive"  src="data:image/png;base64,' . base64_encode(QrCode::format("png")->size(200)->generate("hola")) . '">
  </tr>
</table>
<div>hackersquad@icloud.com</div>
<div>www.HackerSquad.net</div>
<div>V-20472849-2</div>
';
    $pdf->loadHTML($squema)->setPaper($customPaper, 'landscape');
    return $pdf->stream();
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource("mobiles", "MobileController");
Route::resource("features", "FeatureController");

Route::get("clients/printCard/{id}", "ClientController@printCard")->name('clients.printCard');
Route::get("clients/generate", "ClientController@generate")->name('clients.generate');
Route::get("clients/backup", "ClientController@backup")->name('clients.backup');
Route::get("clients/search", "ClientController@search")->name('clients.search');
Route::resource("clients", "ClientController");

Route::get("solicitudes/updateStatus/{id}/{status}", "solicitudeController@updateStatus")->name('solicitudes.updateStatus');
Route::get("solicitudes/search", "solicitudeController@search")->name('solicitudes.search');
Route::resource("solicitudes", "solicitudeController");
Route::resource("status_solicitudes", "StatusSolicitudeController");
