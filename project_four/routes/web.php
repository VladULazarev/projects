<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ArticleController;

// Home page
Route::get('/', function () { return view('layouts.layout'); });

// Show all articles
Route::get('/articles', [
  ArticleController::class, 'index' ])->name('articles.index');

// Store a new article
Route::post('/articles', [ ArticleController::class, 'store' ]);

// Show the form to create a new article
Route::get('/articles/create', [
  ArticleController::class, 'create' ])->name('articles.create');

// Show one article
Route::get('/articles/{article}', [
  ArticleController::class, 'show' ])->name('articles.show');

// Show the form to edit an article
Route::get('/articles/{article}/edit', [
  ArticleController::class, 'edit' ])->name('articles.edit');

// Update the article
Route::put('/articles/{article}', [ ArticleController::class, 'update' ]);

// Show the view to delete article
Route::get('/articles/{article}/destroy', [
  ArticleController::class, 'destroy' ])->name('articles.destroy');

// Delete the current article
Route::delete('/articles/{article}', [ ArticleController::class, 'delete' ]);

// Show all articles by 'tag' if click the name of the tag in a view
Route::get('/articles/tag/{tag}', [
  ArticleController::class, 'articlesByTag' ])->name('articles.articles-by-tag');

// Show all articles by 'tag' using 'Search by tag' form
Route::post('/articles/tag/{tag}', [
  ArticleController::class, 'searchArticlesByTag' ])->name('articles.search-articles-by-tag');

// Show all articles by 'author' if click the name of the author in a view
Route::get('/articles/author/{author}', [
  ArticleController::class, 'articlesByAuthor' ])->name('articles.articles-by-author');
