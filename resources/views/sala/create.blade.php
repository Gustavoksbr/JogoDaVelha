<x-layout title="Criar sala">
    <form method="POST" action="{{ route('sala.store')}}">
        @csrf
        <x-input nome="nomesala" tipo="text" />
        <x-input id="codigo" nome="codigo" tipo="text" />

        <div class="toggle-container">
            <input type="checkbox" id="toggle-public-private" class="toggle-checkbox">
            <label for="toggle-public-private" class="toggle-label">
                <span class="toggle-inner"></span>
                <span class="toggle-switch"></span>
            </label>
            <span id="toggle-text">Privada</span>
        </div>
        <button>Criar</button>
    </form>
    <a href={{route('sala.index')}}>Voltar</a>
</x-layout>
