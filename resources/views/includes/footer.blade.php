<footer class="footer layout-footer">
    <ul class="footer-nav">
        @forelse($nav as $post)
            <li class="footer-nav-item">
                <a href="{{ $post->getPermalink() }}">{{ $post->wp()->post_title }}</a>
            </li>
        @empty
        @endforelse
    </ul>
    <p class="footer-copyright">Copyright &copy; {{ get_bloginfo( 'name' ) }}, {{ date('Y') }} All Rights Reserved.</p>
</footer>
