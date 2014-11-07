<?php

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

	public function index()
	{
		
		$data = DB::table('character_data')
							->join('job_data', 'character_data.name', '=', 'job_data.name')
							->orderBy('character_data.name', 'asc')
							->orderBy('job_data.rank', 'asc')
							->get(['job_data.job']);

		// Log::debug($data);

		return View::make('index')->with('character_data', $data);
	}

	public function search_status()
	{
		$job = Input::get('job');	
		
		// 選択されたジョブデータの取得
		$job_data = DB::table('job_data')
									->join('character_data', 'job_data.name', '=', 'character_data.name')
									->where('job', '=', $job)
									->get();

		// Log::debug($job_data);

		// スロット用スキルの取得
		$name =	$job_data[0]['name'];

		$unformatted_slot_skill =	DB::table('job_data')
										->where('name', '=', $name)
										->where('job', '<>', $job)
										->get(['first_skill', 'second_skill', 'third_skill', 'fourth_skill']);

		$slot_skill = [];

		foreach( $unformatted_slot_skill as $uss ) {
			foreach( $uss as $skill ) {
				if ( !is_null($skill) ) {
					$slot_skill[] = $skill;
				}
			}
		}

		// Log::debug($slot_skill);

		return Response::json(['job_data' => $job_data, 'slot_skill' => $slot_skill]);
	}

	public function error()
	{
		return Response::view('エラーです。<br>もう一度URLをご確認の上、アクセスしてください。');
	}

}
