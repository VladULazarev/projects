<?php
use App\Http\Controllers\ValidatorController;
?>
@extends('layouts.layout')

@section('content')

<div class="row content mt-5 mb-5">

    <div class="count-articles">Found {{ $articlesAmount['count'] }} {{ $articlesAmount['text'] }}</div>

    @foreach ($articles as $article)
    <div class="col-lg-6">
        <?php
            // Cut 'title'
            $title = ValidatorController::setStringLength($article->title, ValidatorController::$strLength);
        ?>
        <section class="article-cart relative break-words">

            <span class="article-author">{{ $article->updated_at }} | </span>

            <span class="article-author">Author: </span>
            <a href="{{ route('articles.articles-by-author', ['author' => $authorUrlName ]) }}"
              class="author-link">{{ $author[0]->name }}
            </a>

            <!-- <span class="article-author mb-2">| Excerpt:</span> -->
            <div class="click-me" data-value="{{ $article->path() }}">

              <h5>{{ $title }}</h5>

              <p>{{ $article->excerpt }}</p>

              <p class="text-end">
                <a href='{{ $article->path() }}' class="article-link">Show article...</a>
              </p>

            </div>

        </section>

    </div>

    @endforeach

</div>

@endsection
