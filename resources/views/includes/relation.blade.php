<h3 class="relation-title">
    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> あなたにオススメ
</h3>

{{-- Posts --}}
<div class="postlist">
    @forelse($relations as $relation)
        <div class="postlist-item">

            {{-- Post Thumbnail --}}
            <div class="postlist-item-thumbnail">
                <a href="{{ $relation->getPermalink() }}">
                    @if($relation->hasIfThumbnail('thumbnail'))
                        <div class="postlist-item-thumbnail-img" style="background-image: url('{{ $relation->getIfThumbnail('thumbnail') }}');">
                            {{ $relation->wp()->post_title }}
                        </div>
                    @else
                        <div class="postlist-item-thumbnail-img is-no-image">No Image</div>
                    @endif
                </a>
            </div>

            {{-- Post Detail --}}
            <div class="postlist-item-detail">

                {{-- Post Title --}}
                <p class="postlist-item-title">
                    <a href="{{ $relation->getPermalink() }}">
                        {{ apply_filters('the_title', $relation->wp()->post_title) }}
                    </a>
                </p>

                {{-- Post Info --}}
                <div class="postlist-item-info">

                    {{-- Post Time --}}
                    <i class="fa fa-clock-o" aria-hidden="true"></i> {{ get_the_date() }} {{ get_the_time() }}

                    {{-- Post Category --}}
                    <i class="fa fa-folder-open-o" aria-hidden="true"></i>
                    <ul class="postlist-item-category-list">
                        @forelse($relation->getCategories() as $category)
                            <li class="postlist-item-category-separator">{{ $category->name }}</li>
                        @empty
                        @endforelse
                    </ul>

                </div>

                {{-- Post Content --}}
                @php
                    $content = strip_tags(strip_shortcodes($post->wp()->post_content));
                @endphp
                @if(mb_strlen($content) > 100)
                    <p class="postlist-item-content">{{ mb_substr($content, 0, 100) }}...</p>
                @else
                    <p class="postlist-item-content">{{ $content }}</p>
                @endif

            </div>
        </div>
    @empty
        <p>該当する記事がありません</p>
    @endforelse
</div>
