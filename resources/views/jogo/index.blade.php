
<x-layout title="jogo">
    <form class="quadradao" action="" method="POST">
    @csrf
    @method('PUT')
        @for($i = 1; $i <= 9; $i++)

            <button class="quadrado" name={{"quadrado".$i}}>
                _
            </button>
        @endfor
    </form>

</x-layout>
