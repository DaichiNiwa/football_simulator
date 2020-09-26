<p class="font-semibold text-xl text-gray-800 leading-tight mb-4">ローン返済</p>
<x-loan-notify :user="$user"/>

@if($user->currentPelica() >= $user->unpaidLoan()->pelicaAmount())
    <form method="POST" action="{{ route('loan-records.update', $user->unpaidLoan()->id) }}">
        @csrf
        @method('PATCH')

        <x-jet-validation-errors class="mb-4"/>

        <div class="flex items-center justify-end mt-4">
            <x-jet-button class="ml-4">
                返済する
            </x-jet-button>
        </div>
    </form>
@else
    <p class="mb-4">所持ペリカが足りないため、返済できません。</p>
@endif
