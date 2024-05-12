<div class="widget">
    <h4 class="widget-title">Recent Blog</h4>
    <ul class="rc__post">

        @foreach ($allBlogs as $blog)
            <li class="rc__post__item">
                <div class="rc__post__thumb">
                    <a href="{{ route('single_blog', $blog->id) }}"><img src="{{ $blog->getImg() }}" alt=""></a>
                </div>
                <div class="rc__post__content">
                    <h5 class="title"><a href="{{ route('single_blog', $blog->id) }}">{{ $blog->title }} </a></h5>
                    <span class="post-date"><i class="fal fa-calendar-alt"></i>{{ $blog->created_at->diffForHumans() }}
                    </span>
                </div>
            </li>
        @endforeach

    </ul>
</div>
