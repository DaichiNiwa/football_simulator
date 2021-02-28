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

    <p class="font-semibold mt-8 text-xl text-blue-1000 leading-tight">
        あなたのクラブ：{{ $me->club_name }}
    </p>
    <h2>（オーナー：{{ $me->name }}）</h2>
    <p>（レギュラー総合力：{{ $me->clubStrength() }}）</p>
    <x-club-image :user="$me"/>
    <x-me-regular-players-table/>

    <p class="font-semibold mt-8 text-xl text-blue-1000 leading-tight">
        対戦相手：{{ $opponent->club_name }}
    </p>
    <h2>（オーナー：{{ $opponent->name }}）</h2>
    <p>（レギュラー総合力：{{ $opponent->clubStrength() }}）</p>
    <x-club-image :user="$opponent"/>
    <x-opponent-regular-players-table :opponent="$opponent"/>

</x-app-layout>
