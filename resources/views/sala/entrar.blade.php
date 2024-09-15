<x-layout title="Entrar na sala">
    <form method="POST">
        @csrf
        <input type="text" name="salaid" value="{{$sala->id}}" hidden/>
        <input type="text" name="donoid" value="{{$sala->id}}" hidden/>
        <label for="nome">Nome da sala:</label>
        <input type="text" value="{{$sala->nome}}" disabled/>
        <label for="nome">Nome do dono:</label>
        <input type="text" value="{{$dono->name}}" disabled/>
        <x-input id="codigo" nome="codigo" tipo="text" />
        <button>Entrar</button>
    </form>
    <a href={{route('sala.index')}}>Voltar</a>
</x-layout>
