<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 50px auto 0;
            text-align: center;
        }
    </style>
</head>
<body>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr {{ ($loop->even) ? "style=background:red" : '' }} >
                <td>{{ $post['id'] }}</td>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['image'] }}</td>
                <td>{{ $post['body'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>

<!-- if() {

}else {

} -->

<!-- short hand operator -->

<!-- echo () ? true : false -->
