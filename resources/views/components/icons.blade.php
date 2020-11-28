{{--
All icons are imported from https://heroicons.com
--}}

@switch($icon)
    @case('hamburger-menu')
        <svg class="{{ $hidden ? 'hidden' : 'block' }} h-{{$size}} w-{{$size}} self-center" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        @break
    @case('arrow-down')
        <svg class="{{ $hidden ? 'hidden' : 'block' }} h-{{$size}} w-{{$size}} self-center" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7m14-8l-7 7-7-7" />
        </svg>
        @break
@endswitch

