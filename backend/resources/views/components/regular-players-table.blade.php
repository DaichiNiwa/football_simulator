<p class="font-semibold mt-8 text-xl text-blue-1000 leading-tight">
    レギュラーメンバー
</p>
@if($affiliations->count() === 11)
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4" role="alert">
        <p>現在レギュラーメンバーは11人です。</p>
    </div>
@else
    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 my-4" role="alert">
        <p>レギュラーメンバーを11人にしないと試合はできません。（現在{{ $affiliations->count() }}）</p>
    </div>
@endif
@if($goalkeepers->count() === 1)
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4" role="alert">
        <p>現在ゴールキーパーが1人入っています。</p>
    </div>
@else
    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 my-4" role="alert">
        <p>ゴールキーパーを1人にしないと試合はできません。（現在{{ $goalkeepers->count() }}）</p>
    </div>
@endif

<table class="table-auto border-separate">
    <thead>
    <tr>
        <th class="px-4 py-2"></th>
        <th class="px-4 py-2">選手名</th>
        <th class="px-4 py-2">攻撃力</th>
        <th class="px-4 py-2">守備力</th>
        <th class="px-4 py-2">出身国</th>
        <th class="px-4 py-2">現在の市場価格</th>
        <th class="px-4 py-2"></th>
    </tr>
    </thead>
    <tbody class="table-striped">
    @foreach($affiliations as $affiliation)
        <tr @if($loop->even) class="bg-blue-100" @endif>
            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
            <td class="border px-4 py-2">
                {{ $affiliation->player->name }}
                @if($affiliation->player->is_goalkeeper)<span class="bg-red-500 text-white rounded p-1">GK</span>@endif
            </td>
            <td class="border px-4 py-2">{{ $affiliation->currentAttackLevel() }}</td>
            <td class="border px-4 py-2">{{ $affiliation->currentDefenseLevel() }}</td>
            <td class="border px-4 py-2">{{ $affiliation->player->country() }}</td>
            <td class="border px-4 py-2">{{ $affiliation->currentPrice() }} ペリカ</td>
            <td class="border px-4 py-2">
                <form method="POST" action="{{ route('changeIsRegular', $affiliation) }}">
                    @csrf
                    @method ('PATCH')
                    <x-jet-button>
                        レギュラーからはずす
                    </x-jet-button>
                </form>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
