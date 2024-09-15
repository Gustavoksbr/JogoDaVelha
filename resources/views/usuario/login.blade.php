<x-layout title="Login">
    <form action={{route('home.index')}} method="POST">
        @csrf
        <x-input nome="nome" tipo="text" />
        <x-input nome="senha" tipo="password" />
        <button>
            Entrar
        </button>
    </form>
</x-layout>



