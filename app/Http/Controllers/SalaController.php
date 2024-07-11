<?php

namespace App\Http\Controllers;

use App\Servicos\Game;
use App\Models\DAO\JogoDAO;
use App\Models\DAO\SalaDAO;
use App\Models\User;
use App\Servicos\Validacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salas = SalaDAO::selectAll();
        $donos = [];
        foreach ($salas as $posicao => $sala) {
            $dono = User::where('id', $sala->donoid)->first();
            $donos[$posicao] = $dono ? $dono->name : null;

        }

        return view("sala.index", compact('salas', 'donos'));

        // $salas = Sala::all();
        // return view("sala.index", compact('salas'));

        // return view("sala.index")->with('salas',$salas);
        // return view("sala.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("sala.create");
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $sala = (object) [
            'nome' => $request->input('nomesala'),
            'senha' => $request->input('codigo'),
            'donoid' => Auth::user()->id,
            'ativo' => true,
            'jogador2' => false
        ];
        $salacriada = SalaDAO::create($sala);

        $salaid = $salacriada->id;

        return redirect()->route('sala.jogando', ['salaid' => $salaid]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function entrar(string $id)
    {


        $sala = SalaDAO::find('id', $id);
        if ($sala->senha) {
            $dono = User::find($sala->donoid);
            return view('sala.entrar', compact('sala'), compact('dono'));

        } else {
            Game::IniciarJogo($sala);
            return redirect()->route('sala.jogando', ['salaid' => $id]);
        }


    }


    public function conferirSenha(Request $request, string $id)
    {
        $sala = SalaDAO::find('id', $id);

        switch ($mensagem = Validacao::conferirDisponibilidade($id)) {
            case $mensagem == "Você está na sala"; {
                return redirect()->route('sala.jogando',['salaid' => $id]);
            }
            case $mensagem == "Esta sala já está cheia"; {
                return redirect()->route('sala.index');
            }
            case $mensagem == "Sala diponivel"; {
                if ($request->codigo == $sala->senha) {
                    Game::IniciarJogo($sala);
                    return redirect()->route('sala.jogando', ['salaid' => $id]);
                } else {
                    return redirect()->route('sala.index');
                }
            }
        }
    }

    public function jogando($salaid)
    {
        $sala = SalaDAO::find('id', $salaid);

        if ($jogo = JogoDAO::find('salaid', $salaid)) {
            if ((Auth::user()->id == $sala->donoid) || ($jogo->atual == true)) {
                
                return view('sala.jogando')->with('sala', $sala)->with('jogo', $jogo)->with('voce', Auth::user()->id);
            }
         else  {
            return redirect()->route('sala.index');
            
        }
    }
        else if(Auth::user()->id == $sala->donoid){


            return view('sala.jogando')->with('sala', $sala)->with('jogo', $jogo)->with('voce', Auth::user()->id);
        }
    


    }
    public function lance(Request $request)
    {
        $jogo = JogoDAO::find('id', $_POST['idjogo']);
        if ((Auth::user()->id == $jogo->jogador1id) || (Auth::user()->id == $jogo->jogador2id)) {
            $proximavez = $jogo->proximavez;
            if (Auth::user()->id == $proximavez) {
                if (Auth::user()->id == $jogo->jogador1id) {
                    $valor = $jogo->jogador1lado;
                    $proximavez = $jogo->jogador2id;
                } else if (Auth::user()->id == $jogo->jogador2id) {
                    $valor = $jogo->jogador2lado;
                    $proximavez = $jogo->jogador1id;
                }
            }

            for ($i = 0; $i <= 9; $i++) {

                if (isset($_POST["quadrado$i"])) {
                    $conteudo = str_split($jogo->conteudo);
                    $conteudo[$i] = $valor;
                    $conteudo = implode('', $conteudo);
                    JogoDAO::update($jogo, 'conteudo', $conteudo);
                    JogoDAO::update($jogo, 'proximavez', $proximavez);
                    $resultado = Game::ConferirPossivelResultado($jogo->conteudo);
                    JogoDAO::update($jogo, 'resultado', $resultado);
                    return redirect()->route('sala.jogando', ['salaid' => $jogo->salaid]);
                }

            }
        } else {
            return redirect()->route('sala.index');
        }
    }
    public function revanche()
    {
    }

}
