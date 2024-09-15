<x-layout title="salas">

    <a href={{route('sala.create')}}>Criar sala</a>
    <table>
        <tr>
            <td><b>Nome:</b></td>
            <td><b>Dono:</b></td>
            <td><b>Privacidade:</b></td>
        </tr>

        @foreach($salas as $posicao => $sala)
                @php
                    if ($sala->senha != null) {
                        $privacidade = 'privado';
                    } else {
                        $privacidade = 'publico';
                    }
                @endphp
                <tr>
                    <td>{{ $sala->nome }}</td>
                    <td>{{ $donos[$posicao]}}</td>
                    <td>{{ $privacidade }}</td>
                    <td> <a href="{{route('sala.entrar', $sala->id)}}">Entrar</a></td>
                </tr>

        @endforeach
    </table>
</x-layout>