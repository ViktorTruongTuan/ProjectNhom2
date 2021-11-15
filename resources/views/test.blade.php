<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{$name}}
<form action="/test" method="POST" enctype="multipart/form-data">
    @csrf
<input type="file" name="pic">
<button type="submit">Submit</button>
</form>
<img src="{{asset($name)}}" alt="img" style="height: 100px;widht=100px">
</body>
</html>
