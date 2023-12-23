<div class="space-y-1">
    @foreach($comments as $comment)
    <p>{{ $comment->body }}</p>
    <hr>
    @endforeach
</div>