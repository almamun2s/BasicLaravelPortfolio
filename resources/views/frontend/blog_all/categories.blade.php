<div class="widget">
    <h4 class="widget-title">Categories</h4>
    <ul class="sidebar__cat">
        @foreach ($categories as $category)
            <li class="sidebar__cat__item"><a href="{{ route('category_blogs', $category->id) }}">{{ $category->name }}
                    ({{ $category->blogs->count() }})</a></li>
        @endforeach
    </ul>
</div>
