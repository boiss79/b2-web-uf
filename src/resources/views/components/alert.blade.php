<div class="absolute top-0 right-0 mt-24 mr-5 text-white font-medium inline-flex justify-center bg-{{ $color }}-600 rounded-full py-2 px-3" id="alert">
    <div class="rounded-full bg-{{ $color }}-500 px-2 mr-2">
        {!! $color === 'green' ? '&#x2714;' : '&#x274C;' !!}
    </div>
    <p>{{ $message }}</p>
</div>