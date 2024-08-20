@extends('layouts.main')

@section('main')
    <!-- page-title -->
    <div class="ttm-page-title-row ttm-bg ttm-bgimage-yes ttm-bgcolor-darkgrey clearfix">
        <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="ttm-page-title-row-inner">
                        <div class="page-title-heading">
                            <h2 class="title">Berita</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                            <span>
                                <a title="Homepage" href="/">Beranda</a>
                            </span>
                            <span>Berita</span>
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
                        @foreach ($posts as $post)
                            <!-- featured-imagebox-post -->
                            <div class="featured-imagebox featured-imagebox-post style3 mt-0">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid" src="{{ $post->thumbnail }}" alt="blog-image"
                                        style="aspect-ratio: 7/7; object-fit: cover; width: 640px; height: auto">
                                    <div class="ttm-box-post-date">
                                        <span class="ttm-entry-date">
                                            <span class="entry-date">{{ $post->date }} {{ $post->month }}
                                                {{ $post->year }}</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5><a
                                                href="{{ route('news.slug', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                        </h5>
                                    </div>
                                    <div class="post-meta">
                                        <span class="ttm-meta-line category-link">{{ $post->category->name }} / {{$post->tag->content}}</span>
                                    </div>
                                    <div class="featured-desc">
                                        <p class="text-justify">{!! Str::limit($post->description, 200, '...') !!}</p>
                                    </div>
                                    <a class="ttm-btn btn-inline ttm-btn-size-md ttm-btn-color-skincolor ttm-icon-btn-right"
                                        href="{{ route('news.slug', ['slug' => $post->slug]) }}">baca selengkapnya <i
                                            class="fa fa-angle-right font-weight-bold"></i></a>
                                </div>
                            </div>
                            <!-- featured-imagebox-post end -->
                        @endforeach
                        {{-- <!-- featured-imagebox-post -->
                        <div class="featured-imagebox featured-imagebox-post style3">
                            <div class="featured-thumbnail">
                                <img class="img-fluid" src="https://via.placeholder.com/640x530?text=640x530+blog-02.jpg" loading="lazy"
                                    alt="blog-image">
                                <div class="ttm-box-post-date">
                                    <span class="ttm-entry-date">
                                        <span class="entry-date">23 Jun 2021</span>
                                    </span>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3><a href="#">INI JUDUL</a></h3>
                                </div>
                                <div class="post-meta">
                                    <span class="ttm-meta-line category-link">Berita</span>
                                </div>
                                <div class="featured-desc">
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. A, dolorem...</p>
                                </div>
                                <a class="ttm-btn btn-inline ttm-btn-size-md ttm-btn-color-skincolor ttm-icon-btn-right"
                                    href="#">baca selengkapnya <i class="fa fa-angle-right font-weight-bold"></i></a>
                            </div>
                        </div>
                        <!-- featured-imagebox-post end -->
                        <!-- featured-imagebox-post -->
                        <div class="featured-imagebox featured-imagebox-post style3">
                            <div class="featured-thumbnail">
                                <img class="img-fluid" src="https://via.placeholder.com/640x530?text=640x530+blog-04.jpg" loading="lazy"
                                    alt="blog-image">
                                <div class="ttm-box-post-date">
                                    <span class="ttm-entry-date">
                                        <span class="entry-date">17 May 2021</span>
                                    </span>
                                </div>
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3><a href="blog-single.html">INI JUDUL</a></h3>
                                </div>
                                <div class="post-meta">
                                    <span class="ttm-meta-line category-link">Berita</span>
                                </div>
                                <div class="featured-desc">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, doloremque...</p>
                                </div>
                                <a class="ttm-btn btn-inline ttm-btn-size-md ttm-btn-color-skincolor ttm-icon-btn-right"
                                    href="#">baca selengkapnya <i class="fa fa-angle-right font-weight-bold"></i></a>
                            </div>
                        </div>
                        <!-- featured-imagebox-post end --> --}}
                        <div class="pagination-block">
                            @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                @if ($i === $posts->currentPage())
                                    <span class="page-numbers current">{{ $i }}</span>
                                @else
                                    <a class="page-numbers" href="{{ $posts->url($i) }}">{{ $i }}</a>
                                    {{-- <a href="{{ $posts->url($i) }}">{{ $i }}</a> --}}
                                @endif
                            @endfor
                            @if ($posts->hasMorePages())
                                <a class="next page-numbers" href="#"><i class="fa fa-long-arrow-right"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 widget-area sidebar-right">
                        <aside class="widget widget-search with-title">
                            <form role="search" method="get" class="search-form" action="{{ route('blogs') }}">
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
                            <h3 class="widget-title">Kategori</h3>
                            <ul>
                                <li class="{{ Route::is('blogs') ? 'text-dark' : '' }}"><a
                                        href="{{ route('blogs') }}">Semua Kategori</a></li>
                                @foreach ($categories as $category)
                                    <li class="{{ $category->id == $category_id ? 'text-dark' : '' }}"><a
                                            href="{{ route('blogs', ['category_id' => $category->id]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
<aside class="widget tagcloud-widget with-title">
    <h3 class="widget-title">Tag</h3>
    <div class="tagcloud">
        @foreach ($tags as $tag)
            @php
                $tag_id = isset($_GET['tag_id']) ? $_GET['tag_id'] : null;
                $style = ($tag_id == $tag->id) ? 'background-color: #5d8e88; color: white;' : '';
            @endphp
            <a href="{{ route('blogs', ['category_id' => $category_id, 'tag_id' => $tag->id]) }}"
                class="tag-cloud-link"
                style="{{ $style }}">{{ $tag->content }}</a>
        @endforeach
    </div>
</aside>
                    </div>
                </div><!-- row end -->
            </div>
        </div>


    </div>
    <!--site-main end-->
@endsection
