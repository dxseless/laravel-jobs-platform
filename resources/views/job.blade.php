<x-layout>
    <x-slot:heading>
        Job: {{ $job->title }}
    </x-slot:heading>

    <p>
        <strong>
        Salary:
        </strong> {{ $job->salary }} per month
    </p>

    <p>
        <strong>
            Location:
        </strong> {{ $job->location }}
    </p>
    <p>
        <strong>
        For more information call {{ $job->employer_phone }}
        </strong>
    </p>
</x-layout>