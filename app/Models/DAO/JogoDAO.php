<?php

namespace App\Models\DAO;
use App\Models\Domain\Sala;
use App\Models\Domain\Jogo;



class JogoDAO
{

    public static function create($Jogo)
    {
        try {
            $Jogo_criado = Jogo::create([
                'conteudo' => $Jogo->conteudo,
                'jogador1id' => $Jogo->jogador1id,
                'jogador2id' => $Jogo->jogador2id,
                'jogador1lado' => $Jogo->jogador1lado,
                'salaid' => $Jogo->salaid,
                'jogador2lado' => $Jogo->jogador2lado,
                'proximavez' => $Jogo->proximavez,
                'resultado' => $Jogo->resultado,
                'atual' => $Jogo->atual
            ]);
        } catch (\Exception $e) {
            return dd($e);
        }
        return $Jogo_criado;
    }
    public static function update(Jogo $jogo,$atributo, $valor )
    {
        try {
            $jogo_mudado = $jogo->update([
                $atributo => $valor
            ]);
        } catch (\Exception $e) {
            return dd($e);
        }
        return $jogo_mudado;
    }

    /**
     * Remove the specified resource from storage.
     */
    public static function selectAll()
    {
        try {
            $Jogos = Jogo::all();
            
        } catch (\Exception $e) {
            return dd($e);
        }
        return $Jogos;
    }

    public static function find($atributo, $valor)
    {
        try {
            $Jogo_encontrado = Jogo::where($atributo, $valor)->first();
            
        } catch (\Exception $e) {
            return dd($e);
        }

        return $Jogo_encontrado;
    }
    public static function select($atributo, $valor)
    {
        try {
            $Jogos_encontrados = Jogo::where($atributo, $valor)->get();
            
        } catch (\Exception $e) {
            return dd($e);
        }

        return $Jogos_encontrados;
    }
    public static function delete($id)
    {
        try {
            Jogo::where('id', $id)->delete();
        } catch (\Exception $e) {
            return dd($e);
        }

    }
}



