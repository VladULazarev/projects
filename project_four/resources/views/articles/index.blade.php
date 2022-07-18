<?php
use App\Models\Article;
use App\Http\Controllers\ValidatorController;
?>
@extends('layouts.layout')

@section('content')

<div class="row content mt-5 mb-5">

    @foreach ($articles as $article)
    <div class="col-lg-6">
        <?php
            // Get author for current article
            $author = Article::find($article->id)->author;
            // Cut 'title'
            $title = ValidatorController::setStringLength($article->title, ValidatorController::$strLength);
        ?>
        <section class="article-cart relative break-words p-3 mt-3">

            <h5 class="mb-2">{{ $title }}</h5>

            <span class="article-author mb-2">{{ $article->updated_at }} | </span>

            <span class="article-author mb-2">Author: </span>
            <a href="{{ route('articles.articles-by-author', ['author' => $article->user_id ]) }}"
              class="author-link mb-2">{{ $author->name }}
            </a>

            <span class="article-author mb-2">| Excerpt:</span>
            <p>{{ $article->excerpt }}</p>

            <p class="text-end pe-3">
              <a href='{{ $article->path() }}' class="article-link">Show article...</a>
            </p>

        </section>

    </div>

    @endforeach

</div>

@endsection