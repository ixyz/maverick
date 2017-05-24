@extends('layouts.master')
@section('content')

{{-- Content --}}
<div class="content layout-content">

    {{-- Post --}}
    <div class="post">

        {{-- Post Title --}}
        <h1 class="post-title">{{ apply_filters('the_title', $post->wp()->post_title) }}</h1>

        {{-- Post Content --}}
        <div class="post-content">
            {!! apply_filters('the_content', $post->wp()->post_content) !!}
        </div>

    </div>

    {{-- Comment --}}
    @if(is_single() && !empty($post->getMeta('writerplus_comment', true)))
        <div class="comment-container">
            <div class="comment-wrap">
                <h3 class="comment-container-title">
                    <i class="fa fa-comments-o" aria-hidden="true"></i> コメント一覧
                </h3>
                @php
                    comments_template();
                @endphp
            </div>
        </div>
    @endif

</div>

{{-- Related Posts --}}
@if(is_single())
    <div class="content layout-content">
        @include('includes.relation')
    </div>
@endif

@endsection
