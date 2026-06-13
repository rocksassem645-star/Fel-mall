<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Backend is way better than frontend, Laravel is amazing</h1>

        @foreach($result as $item)
        <h2>{{$item->id}}</h2>
        <h2>{{$item->title_en}}</h2>
        <h2>{{$item->title_ar}}</h2>
        <h2>{{$item->description_en}}</h2>
        <h2>{{$item->description_ar}}</h2>
        <h2>{{$item->status}}</h2>
        <h2>{{$item->created_at}}</h2>
        <hr>
            @endforeach
    
</body>
</html>