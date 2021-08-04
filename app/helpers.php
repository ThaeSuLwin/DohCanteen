<?php


function subCategory($subCategoryId){
        $subCategory=App\SubCategory::findOrFail($subCategoryId);
        // dd($subCategory);
        return $subCategory;

}

function option($optionId){
    $option=App\Option::findOrFail($optionId);
    // dd($option);
    return $option;
}
function addition($additionId){
    $addition=App\Addition::findOrFail($additionId);
    // dd($addition);
    return $addition;
}

