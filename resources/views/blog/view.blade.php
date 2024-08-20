@extends('layouts.main')

<body>

    <!--page start-->
    <div class="page">

        @section('main')
            <!-- page-title -->
            <div class="ttm-page-title-row ttm-bg ttm-bgimage-yes ttm-bgcolor-darkgrey clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="ttm-page-title-row-inner">
                                <div class="page-title-heading">
                                    <h2 class="title">{{ $post->title }}</h2>
                                </div>
                                <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="/">Beranda</a>
                                    </span>
                                    <span>{{ $post->title }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page-title end -->


            <!--site-main start-->
            <div class="site-main">


                <div class="ttm-row sidebar ttm-sidebar-right clearfix">
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-8 content-area">
                                <!-- post -->
                                <article class="post ttm-blog-single clearfix">
                                    <!-- post-featured-wrapper -->
                                    <div class="ttm-post-featured-wrapper ttm-featured-wrapper">
                                        <div class="ttm-post-featured">
                                            <img class="img-fluid" src="{{ $post->thumbnail }}" alt="{{ $post->slug }}" style="width: 100%; height: auto; aspect-ratio: 16/12;">
                                        </div>
                                    </div><!-- post-featured-wrapper end -->
                                    <!-- ttm-blog-classic-content -->
                                    <div class="ttm-blog-single-content">
                                        <div class="ttm-post-entry-header">
                                            <div class="post-meta">
                                                <span class="ttm-meta-line category"><i
                                                        class="fa fa-folder"></i>{{ $post->category->name }}</span>
                                                <span class="ttm-meta-line date"><i
                                                        class="fa fa-calendar"></i>{{ $post->month }} {{ $post->date }},
                                                    {{ $post->year }}</span>
                                            </div>
                                        </div>
                                        <div class="entry-content">
                                            <div class="ttm-box-desc-text text-justify">
                                                {!! $post->body !!}

                                                <div class="social-media-block">
                                                    <div class="d-sm-flex justify-content-between align-items-center">
                                                        <div class="ttm_tag_lists margin_top15">
                                                            <span class="ttm-tags-links-title ttm-textcolor-darkgrey"><i
                                                                    class="fa fa-tags"></i>Tag:</span>
                                                            <span class="ttm-tags-links"><a
                                                                    href="{{ route("blogs", ["tag_id" => $post->tag->id]) }}">{{ $post->tag->content }}</a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- ttm-blog-classic-content end -->
                                </article><!-- post end -->
                            </div>
                            <div class="col-lg-4 widget-area sidebar-right">
                                <aside class="widget widget-search with-title">
                                    <form role="search" method="get" class="search-form" action="{{ route("blogs") }}">
                                        <label>
                                            <span class="screen-reader-text">Cari untuk:</span>
                                            <input type="search" class="input-text" placeholder="Cari …" value=""
                                                name="search">
                                        </label>
                                        <button
                                            class="btn ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor"
                                            type="submit"><i class="fa fa-search"></i> </button>
                                        </form>
                                </aside>
                                <aside class="widget widget-categories with-title">
                                    <h3 class="widget-title">Ketegori</h3>
                                    <ul>
                                        <li class=""><a href="{{ route('blogs') }}">Semua Kategori</a></li>
                                        @foreach ($categories as $category)
                                            <li class=""><a
                                                    href="{{ route('blogs', ['category_id' => $category->id]) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </aside>
                                <aside class="widget widget-recent-post with-title">
                                    <h3 class="widget-title">Berita Terbaru</h3>
                                    <ul class="widget-post ttm-recent-post-list">
                                        @forelse ($posts as $post)
                                        <li>
                                            <a href="{{ route("news.slug", ["slug" => $post->slug]) }}"><img class="img-fluid"
                                                    src="{{ $post->thumbnail }}"
                                                    alt="{{ $post->slug }}" style="object-fit: cover"></a>
                                            <div class="post-detail">
                                                <span class="post-date"><i class="fa fa-calendar"></i>{{ $post->month }} {{ $post->date }}, {{ $post->year }}</span>
                                                <a href="{{ route("news.slug", ["slug" => $post->slug]) }}">{{ $post->title }}</a>
                                            </div>
                                        </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </aside>
                                <aside class="widget tagcloud-widget with-title">
                                    <h3 class="widget-title">Tag</h3>
                                    <div class="tagcloud">
                                        @foreach ($tags as $tag)
                                            <a href="{{ route('blogs') }}"
                                                class="tag-cloud-link" style="{{ $tag->content == $post->tag->content ? 'background-color: #5d8e88; color: white;' : '' }};">{{ $tag->content }}</a>
                                        @endforeach
                                    </div>
                                </aside>
                            </div>
                        </div><!-- row end -->
                    </div>
                </div>


            </div><!--site-main end-->


    </body>
@endsection
