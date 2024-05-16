<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title??'Home'}}</title>
    @livewireStyles
    @vite(['resources/css/app.css'])
</head>
<body class="max-w-2xl mx-auto mt-10 bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90% text-slate-800">

        {{ $slot }}
   
 
    @livewireScripts
</body>
</html>