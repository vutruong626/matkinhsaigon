<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $alias, $aliasChill = null, $aliasChilllevel = null)
    {
        $paramMenu['parent'] = $alias;
        $paramMenu['parentChill'] = $aliasChill;
        $paramMenu['parentChillLevel'] = $aliasChilllevel;
        $typeNews   = Category::getTypeAlias($paramMenu);

        $parentType = Category::getTypeSlugParent($alias);
        $listType = Category::getTypeNewsSearch($parentType->id);
        // search news
        if($request->has('category')) {
            if($request->has('category')) {
                $data   = $request->input('category');
            } else {
                $data = [$parentType->id];
            }
            
            $news = News::searchNewsByType($data);
        }else {
            $news = News::getNewsByType($typeNews->id);
        }
        // dd($news);
        return view('frontend.pages.news.news', compact('news', 'parentType', 'listType'));
    }

    /**
     * Show the form for detailNews a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailNews($alias = null) {
        $getDetailNews = News::getDetailNews($alias);
        $category = Category::where('type', 'new')->where('parent_id', 0)->first();
        $relatedCategories = News::getRelatedCategories($getDetailNews->id);
        $relatedNews = News::getRetedNewsByCate($relatedCategories->id);
        
        return view('frontend.pages.news.detail-news', compact('getDetailNews', 'category', 'relatedNews'));
    }

    
}
