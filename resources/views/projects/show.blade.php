<!DOCTYPE html>
<html>
<head>
    <title>{{ $project->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/show_project.css') }}">
</head>
<body>
    <h1>{{ $project->name }}</h1>
    <p>{{ $project->description }}</p>
	
	<a href="{{ route('projects.index') }}" class="btn btn-back">Back to Projects</a>

    <form action="{{ route('tasks.store', $project->id) }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Task Title" required>
        <textarea name="description" placeholder="Task Description"></textarea>
        <select name="status">
            <option value="pending">Pending</option>
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>
        <button type="submit">Add Task</button>
    </form>

    @foreach ($project->tasks as $task)
        <div>
            <h3>{{ $task->title }}</h3>
            <p>Status: {{ $task->status }}</p>
            <p>{{ $task->description }}</p>
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <select name="status" onchange="this.form.submit()">
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </form>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach

    <!-- Tambahkan grafik jika diperlukan -->
</body>
</html>
