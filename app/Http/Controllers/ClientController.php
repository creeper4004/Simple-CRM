<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Resources\ClientCollection;

class ClientController extends Controller
{
	public function index()
	{
    $clients = Client::all()->toArray();
    return array_reverse($clients);
	}
	public function create(Request $request)
	{

		$request->validate([
			'name' => 'required',
			'address' => 'required',
			'phone' => 'required',
			'age' => 'required',
			'image' => 'required'
		]);
		$image = $request->file('image');
		$new_name = rand() . '.' . $image->getClientOriginalExtension();
		$client = new Client([
			'name' => $request->input('name'),
			'address' => $request->input('address'),
      'phone' => $request->input('phone'),
			'age' => $request->input('age'),
			/* 'image' => $request->$image */
			'image' => $request->$new_name
		]);
		$client->save();
		return response()->json('successfully added');
	}
  public function edit($id){
    $client = Client::find($id);
    return response()->json($client);
  }
	public function update(Request $request, $id)
	{
		$image_name = $request->hidden_image;
		$image = $request->file('image');
		if ($image != '') {
			$request->validate([
				'name' => 'required',
				'address' => 'required',
				'phone' => 'required',
				'age' => 'required',
				'image' => 'required|image'
			]);
			$image_name = rand() . '.' . $image->getClientOriginalExtension();
			$image->move(public_path('images'), $image_name);
		    } 
		    else {
			$request->validate([
				'name' => 'required',
				'address' => 'required',
				'phone' => 'required',
				'age' => 'required',
			]);
		}
		$client = Client::find($id);
		$client->update($request->all());
    return response()->json('successfully updated');
	}
	public function delete($id)
	{
		$client = Client::find($id);
		$client->delete();
    return response()->json('successfully deleted');
	}
}
