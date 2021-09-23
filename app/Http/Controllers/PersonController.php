<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class PersonController extends Controller
{
    public function index()
    {
       $persons = DB::select('SELECT * FROM people');

       return $persons;
    }
 
    public function show($id)
    {
        $person = DB::table('people')
                ->where('id', $id)
                ->get();

        return $person;
    }

    public function store(Request $request)
    {

        
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $dateOfBirth = $request->dateOfBirth;
        $streetAddress = $request->streetAddress;
        $created_at = Carbon::now();
        $updated_at = Carbon::now();
        

        $person = DB::table('people')->insert([
            'firstName'=>$firstName,
            'lastName'=>$lastName,
            'dateOfBirth'=>$dateOfBirth,
            'streetAddress'=> $streetAddress,
            'created_at'=> $created_at,
            'updated_at'=>$updated_at,
        ]);
        
       
       return $person ;
        
    }

    public function update(Request $request, $id)
    {
        
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $dateOfBirth = $request->dateOfBirth;
        $streetAddress = $request->streetAddress;
        $created_at = Carbon::now();
        $updated_at = Carbon::now();
        

         $person = DB::table('people')
              ->where('id', $id)
              ->update([
                'firstName'=>$firstName,
                'lastName'=>$lastName,
                'dateOfBirth'=>$dateOfBirth,
                'streetAddress'=> $streetAddress,
                'created_at'=> $created_at,
                'updated_at'=>$updated_at,
              ]);

        return $person;
    }

    public function delete(Request $request, $id)
    {
          DB::table('people')->where('id', $id)->delete();  
        return 204;
    }
}
