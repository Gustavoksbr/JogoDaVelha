<x-layout title="Cadastro">
    <form  method="POST">
        @csrf
        <x-input nome="nome" tipo="text" />
        <x-input nome="senha" tipo="password" />
        <button>
            Registrar
        </button>
    </form>
</x-layout>