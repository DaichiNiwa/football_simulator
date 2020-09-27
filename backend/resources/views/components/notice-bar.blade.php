<div class="flex bg-red-200 p-4">
    <div class="mr-4">
        <div class="h-10 w-10 text-white bg-red-600 rounded-full flex justify-center items-center">
            <i class="material-icons">通知</i>
        </div>
    </div>
    <div class="flex justify-between w-full">
        <div class="text-red-600">
            <p class="mb-2 font-bold">
                {{ session('notice') }}
            </p>
            <p>
                {{ session('detail') }}
            </p>
        </div>
    </div>
</div>
