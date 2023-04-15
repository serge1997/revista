<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Mail;
use Carbon\Carbon;

class ResetController extends Controller
{
    

    public function resetform()
    {
        return view('resetauth.link');
    }


    public function submitlinkreset(Request $request)
    {

        $validate = $request->validate([
            'email' => ['required']
        ],

        [
            'email.required' => "E-mail obrigatorio para continuar"
        ]);

        $email = $request->email;

        if (substr_count($email, '@') != 1 || substr_count($email, '.') == 0){

            return back()->withInput()
                ->with('err', "formato do e-mail invalido");
        }


        $checkEmail = Usuario::where('email', $request->email)->first();

        if (!$checkEmail){
            return redirect()->route('reset.form')->withInput()
                ->with('err', "Este e-amil não existe no sistema");
        }


        $token = \Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);


        Mail::send('resetauth.resetmail', ['token'=> $token], function($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->route('reset.form')
            ->with('success', "O e-mail de redefinção foi enviado com sucesso");
    }


    public function resetsenha($token)
    {
        return view('resetauth.resetform', ['token'=> $token]);
    }

    public function submitREsetPassword(Request $request)
    {

        $request->validate([
            'email'=> 'required',
            'token'=> 'required',
            'password' => 'required',
            'confirmpassword' => 'required'
        ],
        [
            'email.required' => "e-mail obrigatorio",
            'password.required' => "senha obrigatorio",
            'confirmpassword' => "confirmação de senha obrigatorio"
        ]);

        $senha = $request->password;
        $confsenha = $request->confirmpassword;

        if($senha != $confsenha){
            return back()->withInput()->with('err', "Senhas devem ser iguais!");
        }

        $checkToken = DB::table('password_reset_tokens')
            ->where('token', $request->token)->first();

        if (!$checkToken) {
            return redirect()->route('reset.form')
                ->with('err', "Token invalido");
        }
        $update = DB::table('password_reset_tokens')
            ->where([
                'email'=>$request->email,
                'token'=>$request->token
            ])->first();


        $user = DB::table('usuarios')->where('email', $request->email)
            ->update([
                'password'=> bcrypt($request->password),
                'confirmpassword' => bcrypt($request->confirmpassword)
            ]);

        DB::table('password_reset_tokens')->where(['email'=>$request->email])->delete();

        return redirect()->route('login')
            ->with('success', "Senha atualizado com sucesso, faz seu login");
    }

    public function viewRevista()
    {

        return view('revistas');
    }
}
