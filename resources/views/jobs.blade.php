<x-layout>
    <x-slot:heading>
        Jobs listing 
    </x-slot:heading>

    <ul class="job-list">
    @foreach ($jobs as $job)
        <li class="job-item">
            <a href="/job/{{ $job->id }}" class="job-link">
                <strong class="job-title">{{ $job->title }}</strong>
                <span class="job-salary">Pays {{ $job->salary }} per month</span>
            </a>
        </li>
    @endforeach
</ul>
    <style>
        .job-list {
            list-style: none;
            padding: 0;
            margin: 0;
            max-width: 800px;
            margin: 0 auto;
        }

        .job-item {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 16px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .job-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .job-link {
            display: block;
            padding: 20px;
            text-decoration: none;
            color: inherit;
        }

        .job-title {
            font-size: 1.5rem;
            color: #333333;
            display: block;
            margin-bottom: 8px;
        }

        .job-salary {
            font-size: 1.1rem;
            color: #666666;
            display: block;
        }
    </style>
</x-layout>