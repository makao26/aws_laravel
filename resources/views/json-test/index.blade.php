<html>
<head>
  <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
  @csrf
  <title>JsonTest/Index</title>
</head>
<body>
  <h1>Index</h1>
  <p>action:{{$act}}</p>
  <p>json1:{{$key1}}</p>
  <p>json2:{{$key2}}</p>
</body>
<html>
