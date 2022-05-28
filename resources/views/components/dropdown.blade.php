@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

{{-- @php
switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'origin-top-right right-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
}
@endphp --}}

<div>

        {{ $trigger }}



        <div class="hidden z-50 my-4 text-base border-1 list-none bg-white rounded divide-y divide-gray-100 shadow-2xl dark:bg-gray-700 dark:divide-gray-600" id="dropdown">
            {{ $content }}
        </div>

</div>
