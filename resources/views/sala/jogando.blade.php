<x-layout title="jogo">

    @if($sala->jogador2id)
        @if($jogo->resultado != null)
            <p>{{$jogo->resultado}}</p>
        @endif
        <form class="quadradao" method="POST">
            @csrf
            @method('POST')
            @php
                $conteudo = str_split($jogo->conteudo);
            @endphp

            <input type="text" name='idjogo' value={{$jogo->id}} hidden>

            @foreach($conteudo as $posicao => $letra)

                <button class="quadrado" name={{"quadrado" . $posicao}} value={{$letra}} @if($voce != $jogo->proximavez || $letra != '_' || $jogo->resultado != null) disabled @endif>
                    {{ $letra }}
                </button>
            @endforeach
        </form>

    @endif
    @if($jogo != null && $jogo->resultado == null)
    @if($voce != $jogo->proximavez )<p>Pra receber o lance do adversário vc vai ter q ficar recarregando a página kkkk</p>
    @else<p>Sua vez</p>
    @endif
    @endif
    <a href={{route('sala.index')}}>Voltar</a>
</x-layout>