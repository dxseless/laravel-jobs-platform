<x-layout>
    <x-slot:heading>Reviews about employer: {{ $employer->title }}</x-slot:heading>

    <h2>Reviews</h2>
    <ul>
        @foreach ($reviews as $review)
            <li>
                <strong>{{ $review->user->name }}</strong> ({{ $review->rating }} звёзд)
                <p>{{ $review->content }}</p>
                <small>{{ $review->created_at->diffForHumans() }}</small>
            </li>
        @endforeach
    </ul>

    {{ $reviews->links() }}

    @auth
        <h3>Leave a review</h3>
        <form method="POST" action="{{ route('reviews.store', $employer) }}">
            @csrf
            <div>
                <label for="rating">Rating (1-5):</label>
                <input type="number" name="rating" id="rating" min="1" max="5" required>
            </div>
            <div>
                <label for="content">Your review:</label>
                <textarea name="content" id="content" required></textarea>
            </div>
            <button type="submit">Send review</button>
        </form>
    @endauth
</x-layout>