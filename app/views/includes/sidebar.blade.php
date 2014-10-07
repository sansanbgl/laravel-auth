<h1>Menu</h1>
@if (Auth::check())
<ul class="nav">
@foreach (Auth::user()->getEffectiveMenu() as $menu)
    @if ($menu->parent_id == 0)
        <li><a href="{{ URL::to($menu->url) }}">{{ $menu->name }}</a></li>
    @endif
@endforeach
</ul>
@endif