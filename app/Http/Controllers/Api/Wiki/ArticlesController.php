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
        $action = Actions::Where('name', Route::getFacadeRoot()->current()->uri().'/create')->first();
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

        $this->checkCategoryExistsOrCreate($request->input('category'));

        $article = new WikiArticles();
        $article->name = $request->input("name");
        $article->content = $request->input("content");
        $article->writer = $request->user()->id;
        $article->status = $request->user()->hasRightsToPerform(Actions::Where('name', Route::getFacadeRoot()->current()->uri().'/create/skip-permission')->first()) ? 1 : 0;
        $article->category =  WikiCategories::Where('name', $request->input("category.name"))->First()->id;
        $article->save();

        return response()->json([
            'article' => $article
        ], 200);
    }

    public function editArticle(Request $request) {
        if (!($request->input("id") && $request->input("name") && $request->input("category") && $request->input("content"))) {
            return response()->json([
                'error' => "Erreur formulaire"
            ], 400);
        }

        $article = WikiArticles::find($request->input("id"));

        if (!$article) {
            return response()->json([
                'error' => "Cet article n'existe pas."
            ], 400);
        }

        $actionEditOwn = Actions::Where('name', Route::getFacadeRoot()->current()->uri().'/edit/own')->first();
        $actionEditOthers = Actions::Where('name', Route::getFacadeRoot()->current()->uri().'/edit/others')->first();
        if (!(($article->writer == $request->user()->id && $request->user()->hasRightsToPerform($actionEditOwn)) || $request->user()->hasRightsToPerform($actionEditOthers))) {
            return response()->json([
                'error' => "l'utilisateur n'a pas les droits de modification sur cet article."
            ], 400);
        }

        $this->checkCategoryExistsOrCreate($request->input('category'));

        $article->name = $request->input("name");
        $article->content = $request->input("content");
        $article->category =  WikiCategories::Where('name', $request->input("category.name"))->First()->id;
        $article->status = $request->user()->hasRightsToPerform(Actions::Where('name', Route::getFacadeRoot()->current()->uri().'/create/skip-permission')->first()) ? 1 : 0;
        $article->touch();

        return response()->json([
            'article' => $article
        ], 200);
    }

    private function checkCategoryExistsOrCreate($categoryFromForm) {

        $checkArticleCategory = array_key_exists('id',$categoryFromForm) ? WikiCategories::find($categoryFromForm['id']) : WikiCategories::Where('name', $categoryFromForm['name'])->First();

        if (!$checkArticleCategory) {
            $category = new WikiCategories();
            $category->name = $categoryFromForm['name'];
            $category->parent_category = $categoryFromForm['parent_category'];
            $category->save();
        }
    }

    public function deleteArticle(Request $request) {
        if (!$request->input("id")) {
            return response()->json([
                'error' => "Erreur formulaire"
            ], 400);
        }

        $article = WikiArticles::find($request->input("id"));

        if (!$article) {
            return response()->json([
                'error' => "Cet article n'existe pas."
            ], 400);
        }

        $actionDeleteOwn = Actions::Where('name', Route::getFacadeRoot()->current()->uri().'/delete/own')->first();
        $actionDeleteOthers = Actions::Where('name', Route::getFacadeRoot()->current()->uri().'/delete/others')->first();
        if (!(($article->writer == $request->user()->id && $request->user()->hasRightsToPerform($actionDeleteOwn)) || $request->user()->hasRightsToPerform($actionDeleteOthers))) {
            return response()->json([
                'error' => "l'utilisateur n'a pas les droits de suppression sur cet article."
            ], 400);
        }

        $article->delete();

        return response()->json([
            'success' => "L'article a bien été supprimé"
        ], 200);
    }
}
