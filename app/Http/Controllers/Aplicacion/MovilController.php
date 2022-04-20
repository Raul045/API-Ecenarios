<?php

namespace App\Http\Controllers\Aplicacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\User;
use Illuminate\Support\Facades\Hash;
use Log;
use Illuminate\Http\RedirectResponse;
use Auth;
use Closure;
use guard;

class MovilController extends Controller
{
    public function MostrarUser($id = null){
        if($id)
            return response()-json(["user"::find($id)],200);
        return response()->json(["users"=>User::all()],200);
    }

    public function AgregarUserM(Request $request){
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->code = rand(1000, 5000);

        if($usuario->save())
            return response()->json(["users"=>$usuario],201);
        return response()->json(null,400);
    }

    public function LoginUserM(Request $request){
        
        $crendenciales = request()->only('email', 'password');
        $user=User::where('email',$request->email)->first();

        if (Auth::attempt($crendenciales)){
            $token=$user->createToken($request->email, ['user:user'])->plainTextToken;
            return response()->json(["token"=>$token],201);
        }else{
            return response()->json(["No encontrado"]);
        }
        // $request->validate([
        //     'email'=>'required|email',
        //     'password'=>'required',
        // ]);
        // $user=User::where('email',$request->email)->first();

        // if(!$user || !Hash::check($request->password, $user->password)){
        //     return view('/Not-found');
        // }
        // if($user->tipo == '1')
        // {
        //     $token=$user->createToken($request->email, ['admin:admin'])->plainTextToken;
        //     return response()->json(["token"=>$token],201);
        // }
        // else
        // {
        //     $token=$user->createToken($request->email, ['user:user'])->plainTextToken;
        //     // return view('/home');
        //     // return response()->json(["token"=>$token],201);
        //     return redirect()->route('Perfil');    
        // }
        
    }

    public function logoutUser(Request $request){

       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect('/');
    }

    public function VerifiedCode(Request $request){
        $request->validate([
            'code'=>'required|string'
        ]);

        $userF = User::where('code', $request->code)->first();
        

        if ($request->code == "613784") {
            return redirect('/');
        }else{
            return redirect('Codigo null');
        }

    }

    public function Returnwelcome(){
        return redirect('/');
    }

    public function Returnverified(){
        return redirect('/verified');
    }
}
