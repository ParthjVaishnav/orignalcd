<div>
<div>
  <table border="2">
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Created At</th>
      <th>Updated At</th>
    </tr>
    @foreach($users as $used)
    <tr>
      <td>{{ $used->name }}</td>
      <td>{{ $used->email }}</td>
      <td>{{ $used->phone }}</td>
      <td>{{ $used->address }}</td>
      <td>{{ $used->created_at }}</td>
      <td>{{ $used->updated_at }}</td>
    </tr>
    @endforeach
  </table>
</div>
</div>
