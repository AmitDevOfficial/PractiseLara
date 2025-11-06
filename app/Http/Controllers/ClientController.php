<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{



    public function register(Request $request) {


        $client = new Client;
        $client->client_id = mt_rand(1111,9999);
        $client->fullName = $request['fullName'];
        $client->email = $request['email'];
        $client->mobile = $request['mobile'];
        $client->password = $request['password'];
        $client->gender = $request['gender'];
        $client->city = $request['city'];
        $client->image = $request['image'];
        $client->status = 1;


        if($client->save()){
            return response()->json(['success' => true, 'message' => 'Client registered successfully..!']);
        }else{
             return response()->json(['success' => false, 'message' => 'Client registered Failed..!']);
        }
        
    }
    




    public function view(Request $request) {
        
        $client = Client::all();
        return response()->json($client);
        // echo "<pre>";
        // print_r($client->toArray());
    }




    public function update_data(Request $request){

        $client = Client::find($request->id);

        $client->fullName = $request->fullName;
        $client->email = $request->email;
        $client->mobile = $request->mobile;
        $client->password = $request->password;
        $client->gender = $request->gender;
        $client->city = $request->city;
        $client->image = $request->image;
        $client->save();

        if($client->save()){
            return response()->json(['status' => true, 'message' => 'Your Data Updated SuccssFully...!']);
        }

    }
    



    public function delete_data(Request $request) {
        
       $client = Client::find($request->id)->delete();

        if($client){
             return response()->json(['success'=>true, 'message' => 'User Deleted Successfully...!']);
        }else{
             return response()->json(['success'=>false, 'message' => 'User Deleted Failed...!']);
        }
    }
}
