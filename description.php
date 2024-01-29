<?php

require_once "./config/controller.php";

$recipes = $burmeseRecipe->connect();

// check if decoding was successful or not 
if ($recipes === null) {
    die("Error decoding JSON fiel");
}

$imageFolder = './images/';

$guid = $_GET['guid'];

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

    <div class="container mx-auto mt-5">

    <div class="font-mono flex justify-around text-3xl flex">
        <i class="fa-solid fa-utensils"></i>
            <h1 class="text-amber-600 ">Burmese Recipes</h1>
            <i class="fa-solid fa-utensils"></i>
        </div>

        <hr class=" font-bold mt-4">

        <div class="">
            <button class="bg-amber-500 px-6 py-2 mt-4 rounded-xl text-dark text-xl  text-end">
                <a href="index.php" class="">Back</a>
            </button>
        </div>

        <!-- card  -->

        <div class="flex flex-wrap mt-10">

            <?php foreach ($recipes as $recipe) : ?>

                <?php if ($recipe['Guid'] == $guid) : ?>

                    <!-- <div class="w-80 rounded-2xl border p-4 mt-10 m-5"> -->

                    <div class="flex">

                        <img class="  w-96 h-80 rounded-xl" src="<?php echo $imageFolder . $recipe['Name'] . '.jpg'; ?>" alt="recipeimage">

                        <div class="mt-3 ml-10  font-mono ">

                            <h1 class="text-amber-600 text-2xl">Menu Name :</h1>

                            <h1 class="text-black text-2xl mt-3 ml-4"> <?php echo $recipe['Name'] ?></h1>

                            <h1 class="text-amber-600 text-2xl mt-2 ">Ingredients: </h1>

                            <h1 class="text-black text-xl mt-3 ml-4"> <?php echo $recipe['Ingredients'] ?></h1>


                            <h1 class="text-amber-600 text-2xl mt-2">How To Cook? </h1>

                            <h1 class="text-black text-xl mt-3 ml-4"> <?php echo $recipe['CookingInstructions'] ?></h1>


                        </div>
                    </div>

                    <!-- </div> -->

                <?php endif; ?>




            <?php endforeach; ?>




        </div>

    </div>


</body>
<script src="https://cdn.tailwindcss.com"></script>

</html>