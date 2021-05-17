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
		$image = $request->file('image');
    $new_name = rand() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('images'), $new_name);
		$client = new Client([
			'name' => $request->input('name'),
			'address' => $request->input('address'),
      'phone' => $request->input('phone'),
			'age' => $request->input('age'),
			/* 'image' => $request->file('image') */
			'image' => $request->$new_name
		]);
		$client->save();
		return response()->json($client);
	}
  public function edit($id){
    $client = Client::find($id);
		return response()->json($client);
  }
	public function update(Request $request, $id)
	{
		$image = $request->file('image');
    $new_name = rand() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('images'), $new_name);
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
