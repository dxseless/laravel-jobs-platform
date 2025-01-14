<x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>

    <form action="/jobs" method="GET" class="filter-form">
        <div class="filter-group">
            <label for="title">Job Title:</label>
            <input type="text" name="title" id="title" value="{{ request('title') }}" placeholder="Enter job title">
        </div>

        <div class="filter-group">
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" value="{{ request('location') }}" placeholder="Enter location">
        </div>

        <div class="filter-group">
            <label for="salary_min">Min Salary:</label>
            <input type="number" name="salary_min" id="salary_min" value="{{ request('salary_min') }}" placeholder="Min salary">
        </div>

        <div class="filter-group">
            <label for="salary_max">Max Salary:</label>
            <input type="number" name="salary_max" id="salary_max" value="{{ request('salary_max') }}" placeholder="Max salary">
        </div>

        <button type="submit" class="filter-button">Filter</button>
    </form>

    <ul class="job-list">
        @foreach ($jobs as $job)
            <li class="job-item">
                <a href="/jobs/{{ $job->id }}" class="job-link">
                    <strong class="job-title">{{ $job->title }}</strong>
                    <span class="job-salary">Salary: {{ $job->salary }} per month</span>
                    <span class="job-location">Location: {{ $job->location }}</span>
                </a>
            </li>
        @endforeach
    </ul>

    <div class="pagination">
        {{ $jobs->withQueryString()->links() }}
    </div>
</x-layout>

<style>
    .filter-form {
        margin-bottom: 20px;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .filter-group {
        margin-bottom: 10px;
    }

    .filter-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .filter-group input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .filter-button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .filter-button:hover {
        background-color: #0056b3;
    }

    /* Остальные стили */
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

    .job-salary, .job-location {
        font-size: 1rem;
        color: #666666;
        display: block;
    }

    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    .pagination a, .pagination span {
        padding: 8px 12px;
        margin: 0 4px;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-decoration: none;
        color: #007bff;
    }

    .pagination a:hover {
        background-color: #f8f9fa;
    }

    .pagination .active {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }
</style>