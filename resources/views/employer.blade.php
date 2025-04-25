<x-layout>
    <x-slot:heading>Employer: {{ $employer->title }}</x-slot:heading>

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $employer->title }}</h1>
        <p class="text-lg text-gray-600">
            <strong>Main Office:</strong> {{ $employer->main_office_location }}
        </p>
        <p class="text-lg text-gray-600">
            <strong>Phone:</strong> {{ $employer->employer_phone }}
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-4">Posted Jobs</h2>
        @if($employer->jobs->count() > 0)
            <ul class="space-y-4">
                @foreach ($employer->jobs as $job)
                    <li class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow duration-200">
                        <a href="/jobs/{{ $job->id }}" class="block text-gray-800">
                            <strong class="text-xl">{{ $job->title }}</strong>
                            <span class="block text-gray-600">Salary: {{ number_format($job->salary, 0) }} ₽ per month</span>
                            <span class="block text-sm text-gray-500">Posted {{ $job->created_at->diffForHumans() }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500 italic">This employer hasn't posted any jobs yet.</p>
        @endif

        <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-4">Reviews</h2>
        <ul class="space-y-4">
            @foreach ($reviews as $review)
                <li class="bg-gray-100 rounded-lg p-4 shadow-sm">
                    <strong class="text-lg text-gray-800">{{ $review->user->name }}</strong> 
                    <span class="text-yellow-500">({{ $review->rating }} stars)</span>
                    <p class="text-gray-700 mt-2">{{ $review->content }}</p>
                    <small class="text-gray-500">{{ $review->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
        </ul>

        <div class="mt-4">
            {{ $reviews->links() }}
        </div>

        @auth
            <h3 class="text-xl font-semibold text-gray-800 mt-6">Leave a review</h3>
            <form method="POST" action="{{ route('reviews.store', $employer) }}" class="mt-4">
                @csrf
                <div class="mb-4">
                    <label for="rating" class="block text-gray-700">Rating (1-5):</label>
                    <input type="number" name="rating" id="rating" min="1" max="5" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-700">Your review:</label>
                    <textarea name="content" id="content" required class="mt-1 block w-full border border-gray-300 rounded-md p-2" rows="4"></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500 transition duration-200">Send a review</button>
            </form>
        @endauth

        <a href="/employers" class="inline-block mt-4 text-blue-600 hover:underline">Back to list</a>
    </div>
</x-layout>