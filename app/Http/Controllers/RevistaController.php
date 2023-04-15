<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use  Illuminate\Validation\Validator;
use App\Models\Usuario;
use App\Models\Nrevista;
use App\Models\Srevista;

class RevistaController extends Controller
{
    
    public function index(Request $request)
    {

        return view('index');
    }


    public function cadastraPage()
    {
        return view('cadastrafile.cadastra');
    }


    public function store(Request $request)
    {

        $validate = $request->validate([
            'nome' => ['required', 'max:60'],
            'email' => ['required', 'max:50'],
            'titulacao' => ['required', 'max:60'],
            'institucao' => ['required', 'max:60'],
            'nartigos' => ['required'],
            'password' => ['required'],
            'confirmpassword' => ['required'],
            'enderecopostal' => ['required'],

        ],

        [
            'nome.required' => "Campo nome obrigatório",
            'nome.max' => "Nome, maximo 60 caracteres",
            'email.required' => "Campo e-mail é obrigatório",
            'titulacao.required' => "Campo titulação obrigatório",
            'institucao.required' => "Campo institução obrigatório",
            'nartigos.required' => "prenche com 0 se não tiver artigo publicado",
            'password.required' => "Senha obrigatório",
            'confirmpassword.required' => "Confirmação da senha obrigatório",
            'enderecopostal.required' => "Endereço postal é obrigatório"
        ]);

        $email = $request->email;

        if (substr_count($email, '@') != 1 || substr_count($email, '.') == 0){

            return back()->withInput()
                ->with('err', "formato do e-mail invalido");
        }


        $senha = $request->password;
        $confsenha = $request->confirmpassword;

        if ($senha != $confsenha){
            return back()->withInput()->with('err', "Senhas devem ser iguais!");
        }

        $values = $request->all();
        $usuario = new Usuario($values);

        $usuario->password = bcrypt($request->password);
        $usuario->confirmpassword = bcrypt($request->confirmpassword);


        try{

            $emailUnique = Usuario::where('email', $usuario->email)->first();

            if($emailUnique){

                return redirect()->route('pagina.cadastra')
                    ->with("err", "E-mail já existe no sistema");
            }

            DB::beginTransaction();
            $usuario->save();
            DB::commit();

            return redirect()->route("pagina.cadastra")
                ->with("success", "Cadastro realisado com sucesso");

        }catch(\Exception $e){
            Log::error("ERRO", ["file" => "RevistaController.store", "message" => $e->getMessage()]);
            return redirect()->route('pagina.cadastra')
                ->with("err", "Usuario, não pode ser cadastrado");
        }
        

    }


    public function logar(Request $request)
    {

        return view('login');
    }


    public function makelogin(Request $request)
    {

        if($request->isMethod("post")){

            $credentials = $request->validate([
                'email' => ['required'],
                'password' => ['required'],
            ]);


            if (Auth::attempt($credentials)){

                $request->session()->regenerate();
                return redirect()->intended();
            }else{
                return redirect()->route('login')
                    ->with("err", "email ou senha invalido");
            }
        }

    }


    public function sair()
    {
        Auth::logout();
        return view('login');
    }

    public function submeter()
    {

        return view('servico.submeter');
    }


    public function publicar(Request $request)
    {

        return view('servico.publicar');
    }



    public function profiluser()
    {

        $data = [];

        $countnrevista = DB::table('nrevista')
            ->count();

        $countsrevista = DB::table('srevista')
            ->count();

        $revistaUser = Nrevista::where('autor_id', Auth::user()->id)
            ->get();


        $data['ncount'] = $countnrevista;
        $data['scount'] = $countsrevista;
        $data['revistauser'] = $revistaUser;


        return view('servico.userprofil', $data);
    }

    public function edituser(Request $request)
    {

        return view('servico.edicaoperfil');
    }


    public function update(Request $request)
    {


        $email = $request->email;
        $telefone = $request->telefone;
        $institucao = $request->institucao;
        $titulacao = $request->titulacao;
        $enderecop = $request->enderecopostal;
        $password = bcrypt($request->password);
        $confirmpassword = bcrypt($request->confirmpassword);

        if (substr_count($email, '@') != 1 || substr_count($email, '.') == 0){

            return back()->withInput()
                ->with('err', "formato do e-mail invalido");
        }

        $password = $request->password;
        $confirmpassword = $request->confirmpassword;

        if ($password != $confirmpassword){
            return back()->withInput()->with('err', "Senhas devem ser iguais!");
        }


        try{

            $updateuser = DB::table('usuarios')
            ->where('id', Auth::user()->id)
            ->update([

                'email' => $email,
                'telefone' => $telefone,
                'institucao'=> $institucao,
                'titulacao' => $titulacao,
                'enderecopostal' => $enderecop,
                'password' => $password,
                'confirmpassword' => $confirmpassword

            ]);

        return redirect()->route('edit.user')
            ->with('success', "Ediçãõ relizado com sucesso");

        }catch(\Exception $e){

            return redirect()->route('edit.user')
            ->with('err', "*ERR0, Verifique coretamente todos os camopos");
        }
        

    }


    public function storenrevista(Request $request)
    {
        $values = $request->all();

        $nrevista = new Nrevista($values);
        $nrevista->autor_id = Auth::user()->id;

        if($request->hasFile('revista') && $request->file('revista')->isValid()){

            $revista = $request->revista;
            $extension = $revista->extension();
            $revistaname = md5($revista->getClientOriginalName(). strtotime("now")). ".". $extension;
            $revista->move(public_path('nrevista/'), $revistaname);
            $nrevista->revista = $revistaname;

            if($extension != "docx"){
                
                return redirect()->route('pagina.submeter')
                    ->with("err", "Extensão do arquivo insurportado, só arquivo docx");
            }
        }

        try{

            DB::beginTransaction();
            $nrevista->save();
            DB::commit();

            return redirect()->route('pagina.submeter')
                ->with("success", "revista submetido com sucesso");

        }catch(\Exception $e){

            return redirect()->route('pagina.submeter')
                ->with("err", "revista não pode ser cadastrado");
        }

    }


    public function storesrevista(Request $request)
    {
        $values = $request->all();

        $srevista = new Srevista($values);
        $srevista->editor_id = Auth::user()->id;

         if($request->hasFile('revista') && $request->file('revista')->isValid()){

            $revista = $request->revista;
            $extension = $revista->extension();
            $revistaname = md5($revista->getClientOriginalName(). strtotime("now")). ".". $extension;
            $revista->move(public_path('srevista/'), $revistaname);
            $srevista->revista = $revistaname;

            if($extension != "pdf"){
                
                return redirect()->route('pagina.publicar')
                    ->with("err", "Extensão do arquivo insurportado, só arquivo pdf");
            }
        }

        try{

            DB::beginTransaction();
            $srevista->save();
            DB::commit();

            return redirect()->route('pagina.publicar')
                ->with('success', "Artigo publicado com sucesso");

        }catch(\Exception $e){

            return redirect()->route('pagina.publicar')
                ->with('err', "*ERRO, revista não pode ser publicado");
        }


    }


    public function search(Request $request)
    {
        $data = [];

        $search = $request->input('psearch');


        if($search){

            $srevista = Srevista::where([

                ['titulo', 'like', '%'.$search.'%']

            ])->orWhere([

                ['nomeautor', 'like', '%'.$search.'%']

            ])->get();

            $data['srevista'] = $srevista;

            return view('servico.search', $data);
        }
    }

     
}
