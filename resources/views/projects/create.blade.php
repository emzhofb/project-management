<!DOCTYPE html>
<html>
<head>
    <title>Create Project</title>
    <link rel="stylesheet" href="{{ asset('css/create_project.css') }}">
</head>
<body>
    <h1>Create New Project</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <label for="name">Project Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br><br>
        
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required><br><br>
        
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required><br><br>
        
        <button type="submit">Create Project</button>
    </form>
</body>
</html>
