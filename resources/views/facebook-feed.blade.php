<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Facebook Posts</h1>

<table>
    <thead>
        <tr>
            <th>Message</th>
            <th>Created Time</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->getField('message') }}</td>
                <td>{{ $post->getField('created_time')->format('Y-m-d H:i:s') }}</td>
                <td><img src="{{ $post->getField('full_picture') }}" alt=""></td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>

</html>
