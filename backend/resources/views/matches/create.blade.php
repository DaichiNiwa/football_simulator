<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-xl text-gray-800 leading-tight">
            対戦する
        </p>
    </x-slot>

    @if($me->canStartMatch() && $opponent->canStartMatch())
        <form method="POST" action="{{ route('matches.store') }}">
            @csrf
            <x-jet-input type="hidden" name="opponent_id" value="{{ $opponent->id }}"/>
            <x-jet-button>
                試合を始める
            </x-jet-button>
        </form>
    @else
        <p>試合はできません</p>
    @endif

    <x-me-regular-players-table/>

    <x-opponent-regular-players-table :opponent="$opponent"/>

</x-app-layout>
