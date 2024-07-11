<?php

namespace App\Models\DAO;
use App\Models\Domain\Jogo;
use App\Models\Domain\Sala;



class SalaDAO
{

    public static function create($sala)
    {
        try {
            $sala_criada = Sala::create([
                'nome' => $sala->nome,
                'senha' => $sala->senha,
                'donoid' => $sala->donoid,
                'ativo' => $sala->ativo,
                'jogador2' => $sala->jogador2
            ]);

        } catch (\Exception $e) {
            return dd($e);
        }

        return $sala_criada;
    }
    public static function update(Sala $sala, $atributo, $valor)
    {
        try {
            $sala_mudada = $sala->update([
                $atributo => $valor
            ]);
        } catch (\Exception $e) {
            return dd($e);
        }
        return $sala_mudada;
    }

    public static function selectAll()
    {
        try {
            $salas = Sala::all();
            
        } catch (\Exception $e) {
            return dd($e);
        }
        return $salas;
    }

    public static function find($atributo, $valor)
    {
        try {
            $sala_encontrada = Sala::where($atributo, $valor)->first();

            
        } catch (\Exception $e) {
            return dd($e);
        }
        return $sala_encontrada;
        

    }

    public static function select($atributo, $valor)
    {
        try {
            $Salas_encontradas = Sala::where($atributo, $valor)->get();
            
        } catch (\Exception $e) {
            return dd($e);
        }

        return $Salas_encontradas;
    }

    public static function delete($id)
    {
        try {
            Sala::where('id', $id)->delete();
        } catch (\Exception $e) {
            return dd($e);
        }

    }
}
