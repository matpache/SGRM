<?php
namespace SGRM;
use \BaseController, \View;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    public function getIndex(){
        $bills = FacturaVenta::whereStatus('En Espera')->get();
        $cotizaciones = RankingCliente::orderBy('valoracion','Desc')->get();


        return View::make('home_admin')
            ->with('bills', $bills)
            ->with('cotizaciones', $cotizaciones);

    }

    public function postLogin(){}

    public function getLogout(){}

}
