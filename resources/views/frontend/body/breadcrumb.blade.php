@php
    $segments = request()->segments();

    $breadcrumbs = [];
    $breadcrumbUrl = '';

    foreach ($segments as $segment) {
        $breadcrumbUrl .= '/' . $segment;
        $breadcrumbs[] = [
            'url' => $breadcrumbUrl,
            'label' => ucfirst($segment), // You can customize the label as needed
        ];
    }

@endphp
<!-- breadcrumb-area -->
<section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">{{ $title }} </h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            @foreach ($breadcrumbs as $breadcrumb)
                                <li class="breadcrumb-item @if ($loop->last) active @endif">
                                    @if ($loop->last)
                                        {{ $breadcrumb['label'] }}
                                    @else
                                        <a href="{{ url($breadcrumb['url']) }}">{{ $breadcrumb['label'] }}</a>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb__wrap__icon">
        <ul>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon01.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon02.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon03.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon04.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon05.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon06.png') }}" alt=""></li>
        </ul>
    </div>
</section>
<!-- breadcrumb-area-end -->
