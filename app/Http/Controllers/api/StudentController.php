<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(User::with("tuition")->where("is_teacher", false)->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "email" => ["required", "email", "unique:users", "bail"],
            "mobile_number" => ["required", "regex:/^01[0-9]{9}$/u", "bail"],
            "first_name" => ["required", "string"],
            "last_name" => ["required", "string"],
        ]);

        $newStudent = new User([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "password" => Hash::make("password"),
            "mobile_number" => $request->mobile_number
        ]);
        $newStudent->save();
        return response(["message" => "OK"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(User::with("tuition")->where("is_teacher", false)->find($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->id != $id) return response(["message" => "Mismatch information."], 422);

        $request->validate([
            "email" => ["required", "email", "unique:users,email,".$id, "bail"],
            "mobile_number" => ["required", "regex:/^01[0-9]{9}$/u", "bail"],
            "first_name" => ["required", "string"],
            "last_name" => ["required", "string"],
        ]);

        $student = User::find($id);
        if(!is_null($student)){
            $student->first_name =$request->first_name;
            $student->last_name = $request->last_name;
            $student->email = $request->email;
            $student->mobile_number = $request->mobile_number;
            $student->save();
            return response(["message" => "OK"]);
        }else{
            return response(["message" => "Nothing found to update."], 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::with("tuition")->where("is_teacher", false)->exists()){
            $user = User::with("tuition")->where("is_teacher", false)->find($id);
            $user->tuition->map(function ($item){
                $item->delete();
            });

            $user->delete();
            return response(["message" => "OK"]);
        }else{
            return response(["message" => "Object not found"], 404);
        }
    }
}
