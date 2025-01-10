<x-layout>
    <x-slot:heading>
        Employer: {{ $employer->title }}
    </x-slot:heading>

    <h1>{{ $employer->title }}</h1>

    <p>
        <strong>Main Office:</strong> {{ $employer->main_office_location }}
    </p>

    <p>
        <strong>Phone:</strong> {{ $employer->employer_phone }}
    </p>

    <h2>Posted Jobs</h2>
    <ul class="job-list">
        @foreach ($employer->jobs as $job)
            <li class="job-item">
                <a href="/jobs/{{ $job->id }}" class="job-link">
                    <strong class="job-title">{{ $job->title }}</strong>
                    <span class="job-salary">Salary: {{ $job->salary }} per month</span>
                </a>
            </li>
        @endforeach
    </ul>

    <a href="/employers" class="back-link">Back to list</a>

    <style>
        h1 {
            font-size: 2rem;
            color: #333333;
            margin-bottom: 16px;
        }

        h2 {
            font-size: 1.5rem;
            color: #333333;
            margin-top: 24px;
            margin-bottom: 16px;
        }

        p {
            font-size: 1.1rem;
            color: #555555;
            margin-bottom: 12px;
        }

        strong {
            color: #333333;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.2s ease;
        }

        .back-link:hover {
            background-color: #0056b3;
        }

        .job-list {
            list-style: none;
            padding: 0;
            margin: 0;
            max-width: 800px;
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
            padding: 16px;
            text-decoration: none;
            color: inherit;
        }

        .job-title {
            font-size: 1.25rem;
            color: #333333;
            display: block;
            margin-bottom: 8px;
        }

        .job-salary {
            font-size: 1rem;
            color: #666666;
            display: block;
        }
    </style>
</x-layout>