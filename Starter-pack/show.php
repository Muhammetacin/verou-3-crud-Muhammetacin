<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Pokèmon Database</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous">
    </script>
</head>
<body>

<h1 id="title" class="d-flex justify-content-center text-white bg-success py-3 mb-3"></h1>

<div class="container d-flex justify-content-center align-content-center w-50">
    <img src="" id="image">
    <div class="d-flex justify-content-center flex-column align-content-center">
        <p id="description">More information about <?= $_GET['name'] ?>. There is no description in the API for me to show here so I am
            writing this text as if there is a description of the pokèmon you're seeing now. Doesn't it look cute
            though?</p>
    </div>
</div>

<div class="container d-flex justify-content-center">
    <a href="index.php" class="btn btn-primary">Back To Home</a>
</div>

<script>
    const title = document.getElementById('title');
    const image = document.getElementById('image');
    const description = document.getElementById('description');

    title.innerHTML = 'Details of <?php echo $_GET['name'] ?>';

    const pokemonApi = fetch(`https://pokeapi.co/api/v2/pokemon/<?php echo strtolower($_GET['name'])?>`)
        .then(response => response.json())
        .then(data => image.src = data.sprites.front_default);

    const pokemonDescrApi = fetch('https://pokeapi.co/api/v2/pokemon-species/<?php echo strtolower($_GET['name'])?>')
        .then(response => response.json())
        .then(data => description.innerHTML = data.flavor_text_entries[0].flavor_text);
</script>

</body>
</html>