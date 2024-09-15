<?php

namespace App\Http\Controllers;

use App\Models\Domain\Jogo;
use App\Models\Domain\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // return view("jogo.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view("jogo.create");
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

    }
    // public function criando($salaid,$donoid,$jogador2id,$jogador1lado,$jogador2lado)
    // {

    //     $sala = Sala::findOrFail($salaid);

    // $jogo = Jogo::create([
    //                 // 'conteudo' => 'nnnnnnnnn',
    //                 'conteudo' => 'abcdefghi',
    //                 'jogador1id' => $donoid,
    //                 'jogador2id' => $jogador2id,
    //                 'jogador1lado' => $jogador1lado,
    //                 'idsala' => $salaid,
    //                 'jogador2lado' => $jogador2lado,

    // ]);
    // $jogoid = $jogo->id;

    // return redirect()->route('sala.jogando',['salaid' => $salaid, 'jogoid' => $jogoid]);

    // }

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

//     public function lance(Request $request)
//     {
        
//         for($i=0;$i>=0;$i++)
//         {
//             if ($_POST['quadrado'.$i])
//             {
//                 dd($_POST['quadrado'.$i]);
//             }
//         }
//     }
 }
