<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="min-h-screen flex flex-col">


<x-layouts.header/>



<main class="flex-grow bg-white">
    {{$slot}}
</main>
<x-layouts.footer/>

</body>
</html>

