<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-xl text-gray-800 leading-tight">
            対戦相手を探す
        </p>
    </x-slot>

    @if($me->canStartMatch())
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4" role="alert">
            <p>現在試合ができます。</p>
        </div>
    @else
        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 my-4" role="alert">
            <p>現在、レギュラーがゴールキーパー1人、フィールドプレーヤー10人になっていないため、試合ができません。</p>
        </div>
    @endif

    <table class="table-auto border-separate">
        <x-jet-validation-errors class="mb-4"/>
        <thead>
        <tr>
            <th class="px-4 py-2">クラブ名</th>
            <th class="px-4 py-2">オーナー</th>
            <th class="px-4 py-2">総合力</th>
            <th class="px-4 py-2">通算成績</th>
            <th class="px-4 py-2"></th>
        </tr>
        </thead>
        <tbody class="table-striped">
        @foreach($users as $user)
            <tr @if($loop->even) class="bg-blue-100" @endif>
                <td class="border px-4 py-2">{{ $user->club_name }}</td>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">500</td>
                <td class="border px-4 py-2">1勝１敗</td>
                <td class="border px-4 py-2">
                        <x-jet-button>
                            対戦する
                        </x-jet-button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</x-app-layout>
