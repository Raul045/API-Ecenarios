<?php

namespace App\Http\Controllers;

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
use App\Mail\CorreoController;
use Illuminate\Support\Facades\Mail;


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
        $usuario->code = "613784";

        if($usuario->save())
            
            $elcorreo=[
                'nombre'=>$usuario->name,
                'correo'=>$usuario->email,
                'codigo'=>$usuario->code,
            ];
            $correo=Mail::to($usuario->email)
                    ->send(new CorreoController($elcorreo));
            return redirect('/verified');
        return response()->json(null, 400);
    }

    public function LoginUser(Request $request){
        
        $crendenciales = request()->only('email', 'password');
        if (Auth::attempt($crendenciales)){
            request()->session()->regenerate();
            return redirect('Dashboard');
        }else{
            return redirect('No encontrado');
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
