<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>Projects</h1>
	<form action="{{ route('projects.index') }}" method="GET">
		<input type="text" name="search" placeholder="Search projects...">
		<button type="submit">Search</button>
	</form>
	
    <a href="{{ route('projects.create') }}" class="btn btn-create">Create New Project</a>
    @foreach ($projects as $project)
        <div>
            <h2>{{ $project->name }}</h2>
            <p>{{ $project->description }}</p>
            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-view">View Details</a>
            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-edit">Edit</a>
            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete">Delete</button>
            </form>
        </div>
    @endforeach
</body>
</html>
