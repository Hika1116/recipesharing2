<?php

namespace App\Entitys;

/**
 * レシピカードエンティティ
 */
class RecipeCardInfo{
    public $recipe_id; //レシピID
    public $user_id; //ユーザーID
    public $user_name; //ユーザー名
    public $title; //レシピタイトル
    public $sentence; //レシピ説明
    public $category_list; //カテゴリーリスト
    public $material_list; //材料リスト
    public $favarit_num; //お気に入り数
}