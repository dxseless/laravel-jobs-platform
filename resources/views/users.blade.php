<x-layout>
    <x-slot:heading>
        Users
    </x-slot:heading>

    <ul class="user-list">
    @foreach ($users as $user)
        <li class="user-item">
            <a href="#" class="user-link">
                <strong class="user-name">User {{ $user->name }}</strong>
                <span class="user-age">Age: {{ $user->age }}</span>
            </a>
        </li>
    @endforeach
    </ul>
    <style>
        .user-list {
            list-style: none; 
            padding: 0;
            margin: 0;
            max-width: 600px; 
            margin: 0 auto; 
        }

        .user-item {
            background-color: #ffffff; 
            border-radius: 8px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
            margin-bottom: 16px;
            transition: transform 0.2s ease, box-shadow 0.2s ease; 
        }

        /* Стили при наведении на элемент */
        .user-item:hover {
            transform: translateY(-4px); 
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        /* Стили для ссылки */
        .user-link {
            display: block;
            padding: 16px; 
            text-decoration: none; 
            color: inherit; 
        }
        .user-name {
            font-size: 1.25rem; 
            color: #333333; 
            display: block; 
            margin-bottom: 8px; 
        }
        .user-age {
            font-size: 1rem;
            color: #666666; 
            display: block;
        }
    </style>
</x-layout>