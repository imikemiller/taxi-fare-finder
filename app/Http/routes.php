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

    return view('index');
});

Route::any('api/events',function(\Illuminate\Http\Request $request){

    $e = new \App\Classes\EventfulEvents();

    $latitude=$request->get('latitude')?$request->get('latitude'):'51.5583343';

    $longitude=$request->get('longitude')?$request->get('longitude'):'-0.0672627';

    $events = $e->search('date=today','within=3','where='.$latitude.','.$longitude)->result();

    $response = [];

    if(!empty($events)) {
        foreach ($events as $venue_id => $event) {

            $title = $event[0]->venue_name->__toString() . ': ' . $event[0]->title->__toString();

            $label = ['text' => $title];

            $response[] = ['id' => $venue_id, 'coords' => ['latitude' => $event[0]->latitude->__toString(), 'longitude' => $event[0]->longitude->__toString()], 'options' => ['label' => $label, 'title' => $title]];
        }
    }

    return json_encode($response);
});
