<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeController extends Controller
{

   
    public function categories(Request $request){
        $categories = Http::get("https://www.themealdb.com/api/json/v1/1/categories.php")->collect();

        return view('categories', ['categories'=>$categories]);
    }


    public function category(Request $request){

        $category_name = $request->route('category_name');
        $meals = Http::get("www.themealdb.com/api/json/v1/1/filter.php?c=$category_name")->collect();

        return view('category', ['meals'=>$meals, 'category'=>$category_name]);
    }

    public function meal(Request $request){
        $meal_id = $request->route('meal_id');
        $response = Http::get("www.themealdb.com/api/json/v1/1/lookup.php?i=$meal_id")->json();
        $meal = $this->prepare_meal($response);
        
        return view('meal', ['meal'=>$meal]);
    }

    public function random(){
        $response = Http::get("www.themealdb.com/api/json/v1/1/random.php")->json();
        $random_meal = $this->prepare_meal($response);

        return view('meal', ['meal'=>$random_meal]);
    }

    private function prepare_meal($response){
        $meal = $response['meals'][0];

        $url =  $this->convert_to_embed($meal['strYoutube']);
        $ingredients = $this->get_ingredients($meal);
        $meal['strYoutube'] = $url;         
        $meal['ingredients'] = $ingredients;

        return $meal;
    }


    private function convert_to_embed($url){
        if(!$url) return null;

        $parsed_url = parse_url($url);
        parse_str($parsed_url['query'], $query);
        $videoId = $query['v'] ?? null;

        if($videoId){
            return "https://www.youtube.com/embed/$videoId";
        }

        return null;
    }

    private function get_ingredients($meal){
        $ingredients = [];
        foreach($meal as $key => $detail){
            if(preg_match('/^strIngredient\d+$/', $key) && $detail){
                $ingredient_num = str_replace('strIngredient', "", $key);
                $measure = $meal["strMeasure$ingredient_num"];
                $ingredients[$detail] = $measure;
            }
        }
        return $ingredients;
    }
}
