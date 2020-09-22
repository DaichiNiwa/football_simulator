<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-xl text-gray-800 leading-tight">
            試合結果
        </p>
    </x-slot>
    @if($result->isMeWinner)
        <p class="font-semibold text-xl text-gray-800 leading-tight">
            勝利！
        </p>
        <p>{{ $result->levelUpPlayer->player->name }}の{{ $result->levelUpSkill->description }}が1レベルアップしました。</p>
        <p>賞金1ペリカ獲得しました。</p>
    @else
        <p class="font-semibold text-xl text-gray-800 leading-tight">
            敗北！
        </p>
    @endif

</x-app-layout>
