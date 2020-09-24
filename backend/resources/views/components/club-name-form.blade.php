<p class="font-semibold text-xl text-gray-800 leading-tight">クラブ名登録</p>
<p class="mb-4">クラブ名は一度登録すると変更できません。</p>
<p class="mb-4">クラブ名を登録すると初回ボーナス20ペリカがもらえます。</p>
<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PATCH')

    <div>
        <x-jet-label value="club_name"/>
        <x-jet-input class="block mt-1 w-full" type="text" name="club_name" :value="old('club_name')" required
                     autofocus autocomplete="club_name"/>
    </div>

    <x-jet-validation-errors class="mb-4"/>

    <div class="flex items-center justify-end mt-4">
        <x-jet-button class="ml-4">
            登録
        </x-jet-button>
    </div>
</form>
