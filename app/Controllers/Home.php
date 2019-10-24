<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$db = \Config\Database::connect();

		$query   = $db->query('SELECT id, text, parent_id from words;');
		$answer = $query->getResultArray();

		$query   = $db->query('SELECT id, text from words WHERE parent_id IS NULL;');
		$results = $query->getResultArray();
		$data['result'] = $results;

		foreach ($results as $row)
		{
			echo $row[0];
			echo $row["text"];
			echo $row["id"];
		}
		return view('welcome_message', $data);
	}

	public function question($id){
		echo $id;
		$db = \Config\Database::connect();

		$query   = $db->query('SELECT text, id from words WHERE parent_id = '.$id.';');
		$results = $query->getResultArray();
		$data['result'] = $results;

		return view('question', $data);
	}

	public function answer($id){
		$db = \Config\Database::connect();

		$query   = $db->query("select is_correct from words where id = ".$id.";");
		$result = $query->getFirstRow();
		$data['result'] = $result->is_correct == 1 ? "Congratulation" : "Wrong";
		return view('answer', $data);
	}

	//--------------------------------------------------------------------

}
