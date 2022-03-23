<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\User;
use Illuminate\Support\Facades\Hash;
use Log;


class UserController extends Controller
{
    public function MostrarUser($id = null){
        if($id)
            return response()-json(["user"::find($id)],200);
        return response()->json(["users"=>User::all()],200);
    }

    public function AgregarUser(Request $request){
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->code = rand(1000, 5000);

        if($usuario->save())
            return view('/Verificacion');
        return response()->json(null, 400);
    }

    public function LoginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user=User::where('email',$request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return view('/Not-found');
        }
        if($user->tipo == '1')
        {
            $token=$user->createToken($request->email, ['admin:admin'])->plainTextToken;
            return response()->json(["token"=>$token],201);
        }
        else
        {
            $token=$user->createToken($request->email, ['user:user'])->plainTextToken;
            return view('/home');
            return response()->json(["token"=>$token],201);
            $name=$request->get('name');
    
            
        }
        
    }

    public function logoutUser(Request $request){

        return response()->json(["destroyed" => $request->user()->tokens()->delete()],200);
        return view('welcome');
    }

    public function VerifiedCode(Request $request){
        $request->validate([
            'code'=>'required|string'
        ]);

        $userF = User::where('code', $request->code)->first();
        

        if ($request->code = $userF->code) {
            return view('welcome');
        }else{
            return view('code-not');
        }

    }

    public function Returnwelcome(){
        return view('/welcome');
    }
}
