<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t92 extends Model
{
    use HasFactory;

    protected $table = 't92';
    protected $guarded = ['id'];

    public static function tree(){

        $allCategories = t92::get();


        $rootCategories = $allCategories->where('MNParentCode' ,'=', 0);

        self::formatTree($rootCategories,$allCategories);
        return $rootCategories;
    }

    private static function formatTree($categories,$allCategories)
    {
        foreach ($categories as $category) {
           $category->children = $allCategories->where('MNParentCode',$category->MNChildCode);

           if($category->children->isNotEmpty()){
             self::formatTree($category->children,$allCategories);
           }
        }
        
    }


}
