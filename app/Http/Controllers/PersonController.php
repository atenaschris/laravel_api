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
        $person = DB::select('select * from people where id = :id', ['id'=>$id]); 
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
        
        $last_id = DB::getPdo()->lastInsertId();

        $sql ='insert into people (id, firstName, lastName, dateOfBirth, streetAddress, created_at, updated_at  ) values (:id, :firstName, :lastName, :dateOfBirth, :streetAddress, :created_at, :updated_at  )';
        
        $person =  DB::insert($sql, ['id'=>$last_id, 'firstName'=>$firstName, 'lastName'=>$lastName,  'dateOfBirth'=>$dateOfBirth, 'streetAddress'=>$streetAddress, 'created_at'=>$created_at, 'updated_at'=>$updated_at ]);
        
        
        
       
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

    public function delete($id)
    {
         DB::delete('delete from people where id = :id', ['id'=>$id]); 
        return 204;
    }
}
