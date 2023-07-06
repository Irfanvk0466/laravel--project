<table border="1" style="width:100%">
    <thead>
        <th>S.no</th>
        <th>Name</th>
        <th>Email</th>
        <th>DOB</th>
        <th>Phone</th>
        <th>Status</th>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td style="color:grey">{{$loop->iteration}}</td>
            <td>{{$user->myName}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->DOB_formatted}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->Status_text}}</td>
        </tr>
        @endforeach
    </tbody>
</table>