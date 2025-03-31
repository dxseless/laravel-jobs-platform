<h2>
    {{ $job->title }}
</h2>

<p>
    <a href="{{ url('/jobs') . '/' . $job->id }}">Your job</a> is now available!
</p>