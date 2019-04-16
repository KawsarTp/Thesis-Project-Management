<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LInk</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="img/favicon.ico" rel="icon" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
        <link href="{{url('css/theme.css')}}" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<a href="{{route('teacher.reset')}}?email={{$email}}&&token={{$token}}">Click me For password reset {{$token}}</a>
</body>
</html>