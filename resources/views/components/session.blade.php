@switch($statusType)
    @case('scc')
        <div class="p-2 w-auto rounded-xl text-green-700 bg-green-100 border border-green-300 flex flex-row mb-2">
            @component ('components.icons', ['icon' => 'success', 'size'=>'5','hidden' => false])
            @endcomponent
            <div class="text-sm text-center ml-1">
                {{ $status }}
            </div>
        </div>
        @break
    @case('err')
        <div class="p-2 w-auto rounded-xl text-red-700 bg-red-100 border border-red-300 flex flex-row mb-2">
            @component ('components.icons', ['icon' => 'error', 'size'=>'5','hidden' => false])
            @endcomponent
            <div class="text-sm text-center ml-1">
                {{ $status }}
            </div>
        </div>
        @break
@endswitch
