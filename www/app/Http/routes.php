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
  <style>
body {
    margin: -1cm 0cm -2cm -0.7cm;
    height: 300px;
    line-height: 20px;
}

  </style>
  <head>

</head>

  <body>
<table width=100%>
  <tr height=300px>
      <td width =40px>
      <img class="img-rounded" src="' . asset("/resources/images/logo-hackersquad.png") . '" style="height:70px;">
      <p>Telf.: +58 251 935 2220</p>
      </td>
    <td ><img class="img-thumbnail"  src="data:image/png;base64,' . base64_encode(QrCode::format("png")->size(270)->generate("hola")) . '"></td>
  </tr>
</table>

 <div>hackersquad@icloud.com</div>
<div>www.HackerSquad.net</div>
<div>V-20472849-2</div>

</body>

</html>
';

    $ddff = '<html>
<head>
  <style>
    body{
      font-family: sans-serif;
    }
    @page {
      margin: 160px 50px;
    }
    header { position: fixed;
      left: -50px;
      top: -160px;
      right: 0px;
      height: 100px;
      background-color: #ddd;
      text-align: center;
    }
    header h1{
      margin: 10px 0;
    }
    header h2{
      margin: 0 0 10px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -50px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }
  </style>
<body>
  <header>
    <h1>Cabecera de mi documento</h1>
    <h2>DesarrolloWeb.com</h2>
  </header>
  <footer>

    <table>
      <tr>
        <td>
            <p class="izq">
              Desarrolloweb.com
            </p>
        </td>
        <td>
          <p class="page">
            Página
          </p>
        </td>
      </tr>
    </table>
  </footer>
  <div id="content">
    <p>
      Lorem ipsum dolor sit...
    </p><p>
    Vestibulum pharetra fermentum fringilla...
    </p>
    <p style="page-break-before: always;">
    Podemos romper la página en cualquier momento...</p>
    </p><p>
    Praesent pharetra enim sit amet...
    </p>
  </div>
</body>
</html>';
    $pdf->loadHTML($squema)->setPaper($customPaper, 'landscape');
    return $pdf->stream();
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource("mobiles", "MobileController");
Route::resource("features", "FeatureController");

Route::get("clients/generate", "ClientController@generate")->name('clients.generate');
Route::get("clients/backup", "ClientController@backup")->name('clients.backup');
Route::get("clients/search", "ClientController@search")->name('clients.search');
Route::resource("clients", "ClientController");

Route::get("solicitudes/updateStatus/{id}/{status}", "solicitudeController@updateStatus")->name('solicitudes.updateStatus');
Route::get("solicitudes/search", "solicitudeController@search")->name('solicitudes.search');
Route::resource("solicitudes", "solicitudeController");
Route::resource("status_solicitudes", "StatusSolicitudeController");
