<h1 style="text-align: center; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #fff; margin-bottom: 30px; font-size: 3em; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);">Student Data</h1>

<!-- Search Section -->
<form action="search" method="get" style="text-align: center; margin-bottom: 30px; position: relative;">
    @csrf
    <input type="text" name="search" placeholder="Search by Name" value="{{ @$search }}" style="padding: 12px 25px; width: 350px; border-radius: 50px; border: none; background: linear-gradient(135deg, #00c6ff, #0072ff); color: #fff; font-size: 18px; font-weight: bold; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); transition: all 0.3s ease-out;">
    <button type="submit" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); padding: 10px 20px; font-size: 18px; font-weight: bold; color: white; background-color: #4CAF50; border: none; border-radius: 25px; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <i class="fas fa-search"></i> Search
    </button>
</form>

<!-- Table Section -->
<div style="overflow-x: auto; padding: 20px; border-radius: 10px; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); background-color: #ffffff;">
    <form action="mltdlt" method="post">
        @csrf
        <table style="width: 100%; border-collapse: collapse; background-color: #fff; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); border-radius: 10px; overflow: hidden;">
            <thead>
                <tr style="background: linear-gradient(135deg, #00c6ff, #0072ff); color: white; font-size: 16px;">
                    <th>Select</th>
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
            <tbody style="font-size: 14px; color: #333;">
                @foreach ($students as $student)
                    <tr style="background-color: #f9f9f9; transition: background-color 0.3s ease;">
                        <td><input type="checkbox" name="ids[]" value="{{ $student->id }}" style="transform: scale(1.5);"></td>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->created_at }}</td>
                        <td>{{ $student->updated_at }}</td>
                        <td>
                            <a href="{{ route('delete-student', $student->id) }}" class="btn btn-danger" onclick="return confirmDelete();">
                                <i class="fas fa-trash-alt"></i> Delete
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('edit', $student->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" style="padding: 15px 25px; background-color: #ff5733; color: white; border: none; border-radius: 50px; font-size: 18px; cursor: pointer; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); transition: all 0.3s ease;">
            <i class="fas fa-trash"></i> Delete Selected
        </button>
    </form>

    <!-- Pagination Section -->
 
</div>
<div style="text-align: center; margin-top: 20px;">
        {{ $students->links() }}
    </div>

<!-- Style Section -->
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #00c6ff, #0072ff);
        margin: 0;
        padding: 0;
        color: #fff;
    }

    .btn {
        text-decoration: none;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 30px;
        display: inline-block;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-danger {
        background-color: #e74c3c;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c0392b;
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(231, 76, 60, 0.5);
    }

    .btn-primary {
        background-color: #3498db;
        color: white;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(52, 152, 219, 0.5);
    }

    button[type="submit"] {
        display: block;
        margin: 20px auto;
        padding: 15px 25px;
        background-color: #ff5733;
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 18px;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #d44e26;
        transform: scale(1.05);
    }

    input[type="text"]:focus {
        border-color: #2e7d32;
        box-shadow: 0 6px 12px rgba(46, 125, 50, 0.3);
    }

    tr:hover {
        background-color: #f1f1f1;
        transform: scale(1.03);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        transition: all 0.3s ease;
    }

    th {
        background: #2c3e50;
        color: white;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tbody tr:hover {
        background-color: #eaf1f3;
    }

    input[type="checkbox"] {
        transform: scale(1.5);
    }
</style>

<!-- Script Section -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>
