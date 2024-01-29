<?php

require_once "./config/controller.php";

$recipes = $burmeseRecipe->connect();

$currentPageData = $burmeseRecipe->paginate();

$totalPages = $burmeseRecipe->link();

// check if decoding was successful or not 
if ($recipes === null) {
    die("Error decoding JSON fiel");
}

$imageFolder = './images/';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burmese Recipes</title>
    <link rel="stylesheet" href="./src/input.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container mx-auto mt-5 mb-5">

        <div class="font-mono flex justify-around text-3xl flex">
        <i class="fa-solid fa-utensils"></i>
            <h1 class="text-amber-600 ">Burmese Recipes</h1>
            <i class="fa-solid fa-utensils"></i>
        </div>

        <hr class=" font-bold mt-4">

        <!-- card  -->

        <div class="flex flex-wrap mt-10 justify-start ms-20">

            <h1 class="text-black text-2xl"> <i class="fa-solid fa-burger me-5 text-amber-600"></i> </h1>

            <?php
            for ($i = 1; $i <= $totalPages; $i++) {

                echo "<div><h1> <a style='color:darkorange; margin:5px ; font-size:25px; font-style: italic;' href='?page=$i'>$i</a></h1></div>";
            }
            ?>

<h1 class="text-black text-2xl ms-6"> <i class="fa-solid fa-burger me-5 text-amber-600"></i> </h1>


        </div>

        <div class="flex flex-wrap justify-around mt-4">

            <?php foreach ($currentPageData as $recipe) : ?>

                <div class="w-96  rounded-2xl border  mt-4 m-5 bg-white p-4 shadow-lg">

                    <img class=" w-96 h-80 rounded-xl" src="<?php echo $imageFolder . $recipe['Name'] . '.jpg'; ?>" alt="recipeimage">

                    <div class="mt-3  font-mono">

                        <p class="text-xl font-bold text-amber-600 mt-4"><?php echo $recipe['Guid'] ?></p>

                        <h1 class=" text-black text-xl mt-4"><?php echo $recipe['Name'] ?></h1>

                        <button class="bg-amber-500 p-2 mt-4 rounded-xl text-dark  text-end">
                            <a href="description.php?guid=<?php echo $recipe['Guid']; ?>">See More...</a>
                        </button>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>


</body>
<script src="https://cdn.tailwindcss.com"></script>

</html>