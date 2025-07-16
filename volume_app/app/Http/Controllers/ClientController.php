<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function index()
    {
        return ApiResponse::succes(Client::all());
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string'
        ]);

        $client = Client::create($request->all());

        return ApiResponse::succes($client);
        

    }

    
    public function show(string $id)
    {
        $client = Client::find($id);

        if($client) {
            return ApiResponse::succes(($client));
        
        }else{
            return ApiResponse::error('Client not found');
        }
    }

   
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|',
            'email' => 'required|email|unique:clients,email' . $id,
            'phone' => 'required|string'
        ]);

        $client = Client::find($id);
        if ($client){
            $client->update($request->all());

            return ApiResponse::succes($client);

        }else {
            return  ApiResponse::error('Client not found');
            
        }

    }

    
    public function destroy(string $id)
    {
        $client = Client::find($id);
        
        if ($client){
            $client->delete();

            return ApiResponse::succes('Client deleted successfully');

        }else {
            return ApiResponse::error('Client not found');
        }
    }
}
