@php
    $loggedIn = auth()->check();

    $rows = \App\Models\NavigationModel::select(
            'tbl_header_navigation.*',
            'tbl_assets.title as asset_title',
            'tbl_assets.url as asset_url',
            'tbl_assets.new_tab as asset_new_tab'
        )
        ->join('tbl_assets', 'tbl_assets.id', '=', 'tbl_header_navigation.page_id')
        ->where('tbl_header_navigation.created_by', app('currentAgent')->id)
        ->where('tbl_header_navigation.status', 1)
        ->orderBy('tbl_header_navigation.priority', 'ASC')
        ->get()
        ->filter(function ($m) use ($loggedIn) {
            // 2 = everyone, 1 = logged-in only, anything else = guests only
            $auth = (string) $m->is_authorized;
            if ($auth === '2') return true;
            if ($auth === '1') return $loggedIn;
            return ! $loggedIn;
        })
        ->groupBy('parent_page_id');

    $headerMenus    = $rows->get(0, collect());   // top level
    $headerChildren = $rows;                      // children keyed by parent menu id
@endphp

@foreach($headerMenus as $menu)
    @php $children = $headerChildren->get($menu->id, collect()); @endphp

    @if($children->isNotEmpty())
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $menu->title }}</a>
            <ul class="dropdown-menu shadow border-0">
                <li>
                    <a class="dropdown-item" href="{{ $menu->asset_url }}" @if($menu->asset_new_tab == 1) target="_blank" rel="noopener" @endif>{{ $menu->title }}</a>
                </li>
                <li><hr class="dropdown-divider"></li>
                @foreach($children as $child)
                    <li>
                        <a class="dropdown-item" href="{{ $child->asset_url }}" @if($child->asset_new_tab == 1) target="_blank" rel="noopener" @endif>{{ $child->title }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ $menu->asset_url }}" @if($menu->asset_new_tab == 1) target="_blank" rel="noopener" @endif>{{ $menu->title }}</a>
        </li>
    @endif
@endforeach