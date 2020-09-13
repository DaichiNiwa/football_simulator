<p class="font-semibold mt-8 text-xl text-gray-1000 leading-tight">
    控えメンバー
</p>
<table class="table-auto border-separate">
    <x-jet-validation-errors class="mb-4"/>
    <thead>
    <tr>
        <th class="px-4 py-2">選手名</th>
        <th class="px-4 py-2">攻撃力</th>
        <th class="px-4 py-2">守備力</th>
        <th class="px-4 py-2">出身国</th>
        <th class="px-4 py-2">市場価格</th>
        <th class="px-4 py-2"></th>
    </tr>
    </thead>
    <tbody class="table-striped">
    @foreach($players as $player)
        <tr @if($loop->even) class="bg-blue-100" @endif>
            <td class="border px-4 py-2">
                {{ $player->name }}
                @if($player->is_goalkeeper)<span class="bg-red-500 text-white rounded p-1">GK</span>@endif
            </td>
            <td class="border px-4 py-2">{{ $player->attack_level }}</td>
            <td class="border px-4 py-2">{{ $player->defense_level }}</td>
            <td class="border px-4 py-2">{{ $player->country() }}</td>
            <td class="border px-4 py-2">{{ $player->price }}</td>
            <td class="border px-4 py-2">
                <form method="POST" action="{{ route('affiliations.store') }}">
                    @csrf
                    <x-jet-input class="hidden" type="number" name="player_id" :value="$player->id" />
                    <x-jet-button>
                        レギュラーにする
                    </x-jet-button>
                </form>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
