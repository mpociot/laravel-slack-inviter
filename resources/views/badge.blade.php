<svg xmlns="http://www.w3.org/2000/svg" width="{{ $width }}" height="20">
    <rect rx="3" width="{{ $width }}" height="20" fill="#555"></rect>
    <rect rx="3" x="{{ $left  }}" width="{{ $width - $left }}" height="20" fill="#{{ $color }}"></rect>
    <path d="M{{ $left - 2 }} 0h4v20h-4z" fill="#{{ $color }}"></path>

    <g text-anchor="left" font-family="Verdana" font-size="11">
        <text fill="#010101" fill-opacity=".3" x="5" y="15">{{ $title }}</text>
        <text fill="#fff" x="5" y="14">{{ $title }}</text>
    </g>

    <g text-anchor="right" font-family="Verdana" font-size="11">
        <text fill="#010101" fill-opacity=".3" x="{{ $left }}" y="15">{{ $value }}</text>
        <text fill="#fff" x="{{ $left }}" y="14">{{ $value }}</text>
    </g>
</svg>