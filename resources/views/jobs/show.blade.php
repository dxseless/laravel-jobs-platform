<x-layout>
    <x-slot:heading>
        {{ $job->title }}
    </x-slot:heading>

    <p class="job-description">{{ $job->description }}</p>

    <div class="job-details">
        <div class="job-detail">
            <p class="job-detail-label">Salary</p>
            <p class="job-detail-value">{{ $job->salary }} ₽</p>
        </div>
        <div class="job-detail">
            <p class="job-detail-label">Location</p>
            <p class="job-detail-value">{{ $job->location }}</p>
        </div>
    </div>

    <div class="buttons">
        <a href="/jobs/{{ $job->id }}/edit" class="button edit">Edit</a>
        <form action="/jobs/{{ $job->id }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="button delete">Delete</button>
        </form>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .job-title {
            font-size: 2rem;
            font-weight: bold;
            color: #1a202c;
            margin-bottom: 20px;
        }

        .job-description {
            font-size: 1rem;
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .job-details {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .job-detail {
            flex: 1;
            background-color: #edf2f7;
            padding: 15px;
            border-radius: 6px;
            text-align: center;
        }

        .job-detail-label {
            font-size: 0.875rem;
            color: #718096;
            margin-bottom: 5px;
        }

        .job-detail-value {
            font-size: 1.25rem;
            font-weight: bold;
            color: #2d3748;
        }

        .buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button {
            display: flex;
            align-items: center;
            padding: 8px 22px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button.edit {
            background-color: #3b82f6;
            color: white;
        }

        .button.edit:hover {
            background-color: #2563eb;
        }

        .button.delete {
            background-color: #ff0000;
            color: white;
        }

        .button.delete:hover {
            background-color: #a61313;
        }
    </style>
</x-layout>