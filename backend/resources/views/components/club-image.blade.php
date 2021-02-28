@isset($user->club_image)
<img src="{{ env('IMG_URL') . $user->club_image}}" style="height: 250px" class="my-2">
@endisset
