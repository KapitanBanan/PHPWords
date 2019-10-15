<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$db = \Config\Database::connect();
		$query   = $db->query('SELECT id, text, parent_id from words;');
		$results = $query->getResultArray();
		$data['result'] = $results[0]['text'];

		foreach ($results as $row)
		{
			echo $row['title'];
			echo $row['name'];
			echo $row['email'];
		}
		return view('welcome_message', $data);
	}

	//--------------------------------------------------------------------

}
