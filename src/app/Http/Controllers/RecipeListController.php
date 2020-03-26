<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Entitys\RecipeCardInfo;
use App\Entitys\SelectData;
use App\Models\Category;
use App\Models\Materials;

class RecipeListController extends Controller
{
    public function index()
    {
        $recipeList = Recipe::all();
        $recipe_card_list = $this->createRecipeList($recipeList);
        $category_array = $this->getCategoryArrayData();
        $material_array = $this->getMaterialArrayData();

        return view('pages.recipe_list')->with(
            ['recipe_card_list'=>json_encode($recipe_card_list, JSON_PRETTY_PRINT),
            'category_array'=>json_encode($category_array, JSON_PRETTY_PRINT),
            'material_array'=>json_encode($material_array, JSON_PRETTY_PRINT),
            'category_form_selected_items'=>'',
            'material_form_selected_items'=>''
            ]);
    }

    public function search(Request $request){
        // 検索条件取得
        $title = '%'.$request->input('title').'%'; //タイトル

        $exist_selected_category = false;
        $category_id_list = [];
        $exist_selected_material = false;
        $material_id_list = [];

        $category_json_data = json_decode($request->input('category'));
        $material_json_data = json_decode($request->input('material'));

        if(count($category_json_data) > 0){
            $exist_selected_category = true;
            foreach($category_json_data as $data){
                $category_id_list[] = $data->id;
            }
        }
        if(count($material_json_data) > 0){
            $exist_selected_material = true;
            foreach ($material_json_data as $data) {
                $material_id_list[] = $data->id;
            }
        }

        Log::debug($category_id_list);
        Log::debug($exist_selected_category);


        $recipeList = Recipe::where('title', 'like', $title)
        ->when($exist_selected_category, function($query) use($category_id_list) {
            return $query->whereIn(
                'id',
                Recipe::select('recipes.id')->join('categorycontrol', 'recipes.id', '=', 'categorycontrol.recipe_id')
                    ->whereIn('categorycontrol.category_id', $category_id_list)
                    ->groupBy('recipes.id')
                    ->havingRaw('COUNT(recipes.id) = ' . (string)count($category_id_list))
            );
        })
        ->when($exist_selected_material, function($query)use($material_id_list){
            return $query->whereIn(
                'id',
                Recipe::select('recipes.id')->join('materialcontrol', 'recipes.id', '=', 'materialcontrol.recipe_id')
                    ->whereIn('materialcontrol.material_id', $material_id_list)
                    ->groupBy('recipes.id')
                    ->havingRaw('COUNT(recipes.id) = '.(string)count($material_id_list))
            );
        })->get();

        $recipe_card_list = $this->createRecipeList($recipeList);
        $category_array = $this->getCategoryArrayData();
        $material_array = $this->getMaterialArrayData();

        return view('pages.recipe_list')->with(
            ['recipe_card_list'=>json_encode($recipe_card_list, JSON_PRETTY_PRINT),
            'category_array'=>json_encode($category_array, JSON_PRETTY_PRINT),
            'material_array'=>json_encode($material_array, JSON_PRETTY_PRINT),
            'category_form_selected_items' => $request->input('category'),
            'material_form_selected_items' => $request->input('material')
            ]);
    }

    /**
     * カテゴリーテーブルの主キーとカテゴリー名を配列で取得
     * @return category_array
     */
    private function getCategoryArrayData(){
        $category_list = Category::all();
        $category_array = [];
        foreach($category_list as $category){
            $select_data = new SelectData();
            $select_data->id = $category->id;
            $select_data->data = $category->category_name;
            $category_array[] = $select_data;
        }
        // $category_array = array();
        // foreach($category_list as $category){
        //     $category_array[$category->id] = $category->category_name;
        // }
        return $category_array;
    }
    /**
     * 材料テーブルの主キーと材料名を配列で取得
     * @return material
     */
    private function getMaterialArrayData(){
        $material_list = Materials::all();
        $material_array = [];
        foreach($material_list as $material){
            $select_data = new SelectData();
            $select_data->id = $material->id;
            $select_data->data = $material->material_name;
            $material_array[] = $select_data;
        }
        return $material_array;
    }

    private function createRecipeList($recipeList){
        $recipe_card_list = [];
        foreach($recipeList as $recipe){
            //値の設定
            $recipe_element = new RecipeCardInfo();
            $recipe_element->recipe_id = $recipe->id;
            $recipe_element->user_id = $recipe->user->id;
            $recipe_element->user_name = $recipe->user->name;
            $recipe_element->title = $recipe->title;
            $recipe_element->sentence = $recipe->sentence;
            $recipe_element->favarit_num = $recipe->created_sum;
            $category_list = [];
            foreach($recipe->categoryInfos as $category){
                $category_list[] = $category->category_name;
            }
            $material_list = "";

            $is_first_material= true;
            foreach($recipe->materialInfos as $material){
                if($is_first_material){
                    $material_list = $material_list.$material->material_name;
                    $is_first_material= false;
                    continue;
                }
                $material_list = $material_list.",".$material->material_name;
            }
            $recipe_element->category_list = $category_list;
            $recipe_element->material_list = $material_list;

            $recipe_card_list[] = $recipe_element;
        }
        return $recipe_card_list;
    }
}