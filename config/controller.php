<?php

class BurmeseRecipes
{
    public function connect()
    {
        $json_file = "./json/BurmeseRecipes.json";

        $json_data = file_get_contents($json_file);

        $recipes = json_decode($json_data, true);

        return $recipes;
    }

    public function paginate()
    {
        $recipes = $this->connect();
        $cardsPerPage = 9;

        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $startIndex = ($page - 1) * $cardsPerPage;

        $currentPageData = array_slice($recipes, $startIndex, $cardsPerPage);

        return $currentPageData;

    }

    public function link()
    {
        $recipes = $this->connect();
        $cardsPerPage = 9;

        $totalItems = count($recipes);
        $totalPages = ceil($totalItems / $cardsPerPage);

        return $totalPages ;
    }

  
}
$burmeseRecipe = new BurmeseRecipes();
