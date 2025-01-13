<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->title }}</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="job-title">{{ $job->title }}</h1>

        <p class="job-description">{{ $job->description }}</p>

        <div class="job-details">
            <div class="job-detail">
                <p class="job-detail-label">Зарплата</p>
                <p class="job-detail-value">{{ $job->salary }} ₽</p>
            </div>
            <div class="job-detail">
                <p class="job-detail-label">Локация</p>
                <p class="job-detail-value">{{ $job->location }}</p>
            </div>
        </div>

        <div class="buttons">
            <form action="{{ route('jobs.like', $job) }}" method="POST">
                @csrf
                <button type="submit" class="button like">
                    <span class="button-icon">❤️</span> Лайк
                </button>
            </form>

            <form action="{{ route('jobs.unlike', $job) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="button unlike">
                    <span class="button-icon">💔</span> Убрать лайк
                </button>
            </form>

            <form action="{{ route('jobs.favorite', $job) }}" method="POST">
                @csrf
                <button type="submit" class="button favorite">
                    <span class="button-icon">⭐</span> Добавить в избранное
                </button>
            </form>

            <form action="{{ route('jobs.unfavorite', $job) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="button unfavorite">
                    <span class="button-icon">❌</span> Убрать из избранного
                </button>
            </form>
        </div>
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
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button.like {
            background-color: #3b82f6;
            color: white;
        }

        .button.like:hover {
            background-color: #2563eb;
        }

        .button.unlike {
            background-color: #ef4444;
            color: white;
        }

        .button.unlike:hover {
            background-color: #dc2626;
        }

        .button.favorite {
            background-color: #f59e0b;
            color: white;
        }

        .button.favorite:hover {
            background-color: #d97706;
        }

        .button.unfavorite {
            background-color: #6b7280;
            color: white;
        }

        .button.unfavorite:hover {
            background-color: #4b5563;
        }

        .button-icon {
            margin-right: 8px;
        }
    </style>
</body>
</html>