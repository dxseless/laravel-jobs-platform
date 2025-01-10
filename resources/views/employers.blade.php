<x-layout>
    <x-slot:heading>
        Employers Listing
    </x-slot:heading>

    <ul class="employer-list">
        @foreach ($employers as $employer)
            <li class="employer-item">
                <a href="/employers/{{ $employer->id }}" class="employer-link">
                    <strong class="employer-title">{{ $employer->title }}</strong>
                    <span class="employer-location">{{ $employer->main_office_location }}</span>
                </a>
            </li>
        @endforeach
    </ul>

    <div>
        {{ $employers->links() }}
    </div>
</x-layout>

<style>
    .employer-list {
        list-style: none;
        padding: 0;
        margin: 0;
        max-width: 600px;
        margin: 0 auto;
    }

    .employer-item {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 16px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .employer-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .employer-link {
        display: block;
        padding: 16px;
        text-decoration: none;
        color: inherit;
    }

    .employer-title {
        font-size: 1.25rem;
        color: #333333;
        display: block;
        margin-bottom: 8px;
    }

    .employer-location {
        font-size: 1rem;
        color: #666666;
        display: block;
    }
</style>