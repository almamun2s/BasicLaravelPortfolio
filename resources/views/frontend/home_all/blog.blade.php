@php
    $blogs = App\Models\Blog::latest()->limit(3)->get();
@endphp
<!-- blog-area -->
<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="{{ route('single_blog', $blog->id) }}"><img src="{{ $blog->getImg() }}"
                                    alt=""></a>
                            <div class="blog__post__tags">
                                <a href="{{ route('category_blogs', $blog->category->id) }}">{{ $blog->category->name }}
                                </a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span class="date">{{ $blog->created_at->diffForHumans() }} </span>
                            <h3 class="title"><a href="{{ route('single_blog', $blog->id) }}">{{ $blog->title }} </a>
                            </h3>
                            <a href="{{ route('single_blog', $blog->id) }}" class="read__more">Read mORe</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="blog__button text-center">
            <a href="{{ route('blogs') }}" class="btn">more blog</a>
        </div>
    </div>
</section>
<!-- blog-area-end -->
