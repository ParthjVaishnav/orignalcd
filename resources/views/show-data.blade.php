<h1 style="text-align: center; font-family: Arial, sans-serif; color: #333; margin-bottom: 20px;">Student Data</h1>
<div style="overflow-x: auto; padding: 20px;">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->created_at }}</td>
                    <td>{{ $student->updated_at }}</td>
                    <td>
                        <a href="{{ route('delete-student', $student->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                    <td>
                        <a href="{{ route('edit', $student->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    h1 {
        color: #4CAF50;
    }

    div {
        margin: 0 auto;
        max-width: 90%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 14px;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
        transform: scale(1.01);
        transition: all 0.3s ease-in-out;
    }

    .btn {
        text-decoration: none;
        padding: 8px 12px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 4px;
        transition: 0.3s;
    }

    .btn-danger {
        background-color: #e74c3c;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c0392b;
        box-shadow: 0 2px 6px rgba(231, 76, 60, 0.5);
    }

    .btn-primary {
        background-color: #3498db;
        color: white;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        box-shadow: 0 2px 6px rgba(52, 152, 219, 0.5);
    }
</style>
