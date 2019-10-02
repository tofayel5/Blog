@extends('layouts.frontend.app')

@section('title','Posts')

@push('css')

    <link href="{{asset('assets/frontend/css/category/responsive.css')}}" rel="stylesheet">

    <link href="{{asset('assets/frontend/css/category/styles.css')}}" rel="stylesheet">
    <style>
        .favorite_posts {
            color: #2C009F;
        }
    </style>
@endpush

@section('content')
    <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>ALL POST</b></h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img src="{{ asset('storage/post/'.$post->image) }}"
                                                             alt="{{ $post->title }}" alt="Blog Image"></div>

                                <a class="avatar" href="{{ route('author.profile',$post->user->username) }}"><img src="{{ asset('storage/profile/'.$post->user->image) }}" alt="Profile Image"></a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="{{ route('post.details',$post->slug) }}"><b>{{ $post->title }}</b></a></h4>

                                    <ul class="post-footer">
                                        <li>
                                            @guest
                                                <a href="javascript:void(0)"
                                                   onclick="toastr.info('To add favorite list.You need to login first.','Info',{
                                                       closeButton:true,
                                                       progressBar:true,
                                                   })"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}
                                                </a>
                                            @else
                                                <a href="javascript:void(0)"
                                                   onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();"
                                                   class="{{ Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count() == 1 ? 'favorite_posts' : '' }}">

                                                    <i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}

                                                </a>

                                                <form id="favorite-form-{{ $post->id }}" method="POST"
                                                      action="{{ route('post.favorite',$post->id) }}"
                                                      style="display: none;">
                                                    @csrf
                                                </form>

                                            @endguest
                                        </li>
                                        <li><a href="#"><i class="ion-chatbubble"></i>{{ $post->comments->count() }}</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforeach
            </div><!-- row -->

            {{ $posts->links() }}

        </div><!-- container -->
    </section><!-- section -->


@endsection

@push('jss')

@endpush
