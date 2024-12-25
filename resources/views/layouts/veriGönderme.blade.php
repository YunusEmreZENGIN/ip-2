<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veri Gönderme</title>
</head>
<body>
<thread>
    <th>
        <th>#</th>
        <th>Rover ID</th>
        <th>Operator ID</th>
        <th>Bundle ID</th>
        <th>Operasyon Adı</th>
        <th>Zaman</th>

    </th>

</thread>
<tbody>
    @foreach($rovers as $rover)
        <tr>
            <td>{{$rover->id}}</td>
            <td>{{$rover->rover_id}}</td>
            <td>{{$rover->operator_id}}</td>
            <td>{{$rover->bundle_id}}</td>
            <td>{{$rover->operations_name}}</td>
            <td>{{$rover->created_at}}</td>
            <td>{{$rover->updated_at}}</td>
        </tr>
    @endforeach

</tbody>

</body>
</html>
