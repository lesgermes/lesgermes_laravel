<?php

namespace App\Http\Controllers\Api\Wiki;

use App\User;
use App\Actions;
use App\UsersRoles;
use App\RolesActions;
use App\WikiArticles;
use App\WikiCategories;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;


class ArticlesController extends Controller
{
    public function createArticle(Request $request)
    {
        $action = Actions::Where('name', Route::getFacadeRoot()->current()->uri())->first();
        if (!$request->user()->hasRightsToPerform($action)) {
            return response()->json([
                'error' => "l'utilisateur n'a pas les droits sur cette action."
            ], 400);
        }

        if (!($request->input("name") && $request->input("category") && $request->input("content"))) {
            return response()->json([
                'error' => "Erreur formulaire"
            ], 400);
        }

        $checkArticle = WikiArticles::Where('name', $request->input("name"))->First();

        if ($checkArticle) {
            return response()->json([
                'error' => "Un article avec le même nom est déjà présent."
            ], 400);
        }

        $checkArticleCategory = $request->input("category.id") ? WikiCategories::find($request->input("category.id")) : WikiCategories::Where('name', $request->input("category.name"))->First();

        if (!$checkArticleCategory) {
            $category = new WikiCategories();
            $category->name = $request->input("category.name");
            $category->parent_category = $request->input("category.parent_category");
            $category->save();
        }

        $article = new WikiArticles();
        $article->name = $request->input("name");
        $article->content = $request->input("content");
        $article->writer = $request->user()->id;
        $article->status = 0;
        $article->category =  WikiCategories::Where('name', $request->input("category.name"))->First()->id;
        $article->save();

        return response()->json([
            'article' => $article
        ], 200);
    }
}
