<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Http\Controllers\ValidatorController;

class ArticleController extends Controller
{
    /**
     * Show all existing articles
     */
    public function index()
    {
        $articles = Article::latest()->get();

        // Count found articles and set 'text' as 'article' or 'articles'
        $articlesAmount = ValidatorController::countArticles($articles);

        return view('articles.index', [
            'articles' => $articles,
            'articlesAmount' => $articlesAmount
        ]);
    }

    /**
     * Show an article
     */
    public function show(Article $article)
    {
        // Get the author for the current article
        $author = Article::find($article->id)->author;

        $authorUrlName = ValidatorController::convertAuthorName($author->name);

        // Set array of existing 'tags' for the current article
        $tags = explode(', ', $article->tags);

        return view('articles.show', [
            'article' => $article,
            'author'  => $author,
            'authorUrlName' => $authorUrlName,
            'tags' => $tags
        ]);
    }

    /**
     * Show the view to edit an existing article
     */
    public function edit(Article $article)
    {
        return view('articles.edit', [ 'article' => $article ]);
    }

    /**
     * Update the edited article
     */
    public function update(Article $article)
    {
        // Validate the input and update
        $article->update($this->validateArticle());

        return redirect($article->path());
    }

    /**
     * Show the view to create a new article
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store the new article
     * By default, 'user_id' will be set as '1'
     */
    public function store(Article $article)
    {
        // Validate the input and create
        $article->create($this->validateArticle());

        return redirect()->route('articles.show', ['article' => request('slug') ]);
    }

    /**
     * Show the view to delete an article
     */
    public function destroy(Article $article)
    {
        return view('articles.destroy', [ 'article' => $article ]);
    }

    /**
     * Delete the current article
     */
    public function delete(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    /**
     * Validate user's input
     *
     * @return array if validation is ok the method returns array like:
     *  ["tags" => "js",
     *  "title" => "sdfgfdfg",
     *  "excerpt" => "asd",
     *  "body" => "fdsasdfds sdfd"
     *  ... ]
     *  and an article can be updated or a new article can be created
     *
     * If valodation is NOT OK we can see messsages from array '@error'
     *  (see create.blade.php or edit.blade.php)
     */
    protected function validateArticle()
    {
        return request()->validate([
            'slug'    => 'bail|required|min:3|max:50|regex:/^[A-Za-z0-9\-]+$/',
            'tags'    => 'bail|required|min:2|max:50|regex:/^[A-Za-z, ]+$/',
            'title'   => 'bail|required|min:3|max:100|regex:/^[\w.\- ,]+$/u',
            'excerpt' => 'bail|required|min:3|max:200|regex:/^[\w.\- !,?:;]+$/u',
            'body'    => 'bail|required|min:3|max:2000|regex:/^[\w.\- !,?:;]+$/u'
        ]);
    }

    /**
     * Show articles if click 'tag' link from 'show.blade.php' view
     * @param string name of a 'tag'
     */
    public function articlesByTag(string $tag)
    {
        // Check the user's input
        (! ValidatorController::checkUriPart($tag) ) ?? abort(404);

        $articles = Article::latest()->where('tags', 'like', "%$tag%")->get();

        // Count found articles and set 'text' as 'article' or 'articles'
        $articlesAmount = ValidatorController::countArticles($articles);

        // If OK
        return view('articles.articles-by-tag', [
            'articles' => $articles,
            'articlesAmount' => $articlesAmount
        ]);
    }

    /**
     * Show articles by 'tag' name from the 'Search by tag' form
     *
     * Note: The logic is a bit different here, we have to send 'false'
     * if something went wrong or nothing was found,
     * or a view to /public/js/app.js line 68
     *
     * @param string name of a 'tag'
     */
    public function searchArticlesByTag(string $tag)
    {
        // Check the user's input
        if (! ValidatorController::checkUriPart($tag)) {
            return false; // It goes to /public/js/app.js line 68
        }

        // Get articles by tag from search field
        $articles = Article::latest()->where('tags', 'like', "%$tag%")->get();

        // Count found articles and set array '$articlesAmount'
        $articlesAmount['count'] = count($articles);

        // If nothing was found
        if (! $articlesAmount['count']) {
            return false; // It goes to /public/js/app.js line 68
        } else {

            // Set 'text' as 'article' or 'articles' and add it to '$articlesAmount'
            ( $articlesAmount['count'] == 1 ) ?
            $articlesAmount['text'] = 'article' : $articlesAmount['text'] = 'articles';

            return view('articles.search-articles-by-tag', [
                'articles' => $articles,
                'articlesAmount' => $articlesAmount
            ]);
        }
    }

    /**
     * Show articles by author if click 'author-name' link
     * @param string author's 'name'
     */
    public function articlesByAuthor(string $author)
    {
        // Check the user's input,
        // Current url: http://laraveltest/articles/author/jone-dow
        (! ValidatorController::checkUriPart($author) ) ?? abort(404);

        // Convert 'jone-dow' into 'jone dow'
        $authorName = str_replace('-', ' ', $author);

        // Get author
        $authorObj = User::where('name', $authorName)->get();

        // Check if author was found
        ValidatorController::countItems($authorObj);

        // Get articles by the currrent author
        $articles = Article::latest()->where('user_id', $authorObj[0]->id)->get();

        // Count found articles and set 'text' as 'article' or 'articles'
        $articlesAmount = ValidatorController::countArticles($articles);

        // If OK
        return view('articles.articles-by-author', [
            'articles' => $articles,
            'articlesAmount' => $articlesAmount,
            'author' => $authorObj,
            'authorUrlName' => $author
        ]);
    }
}
