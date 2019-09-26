<!-- commentlist -->
<ol class="commentlist">

    <li class="depth-1">

        <div class="avatar">
            <img width="50" height="50" class="avatar" src="{{ asset('storage/profile.png') }}" alt="">
        </div>

        <div class="comment-content">

            <div class="comment-info">
                <cite>{{ $comment->name }}</cite>

                <div class="comment-meta">
                    <time class="comment-time" datetime="{{ $comment->created_at }}">{{ $comment->created_at->format('F d, Y @ h:s') }}</time>
                    <span class="sep"></span>
                </div>
            </div>

            <div class="comment-text">
                <p>{{ $comment->content }}</p>
            </div>

        </div>

    </li>
    @if ($comment->replies)
        @include('comments.list', ['comments' => $comment->replies])
    @endif
