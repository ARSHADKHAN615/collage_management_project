@component('mail::message')

# {{$formData['title']}}



{{$formData['content']}}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
