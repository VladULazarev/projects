@extends('layouts.layout')

@section('content')

<div class="row content mt-5 mb-5">

    <div class="col-lg-6">

        <section class="article-cart relative break-words">

            <span class="article-author">{{ $article->updated_at }} | </span>

            <span class="article-author">Author: </span>
            <a href="{{ route('articles.articles-by-author', [ 'author' => $authorUrlName ]) }}"
              class="author-link">{{ $author->name }}
            </a>

            <h5 class="mb-3">{{ $article->title }}</h5>

            <p>{{ $article->body }}</p>

            <p class="mt-3">Tags:
                @foreach ($tags as $tag)
                    <a href="{{ route('articles.articles-by-tag', ['tag' => $tag ]) }}"
                      class="article-link">{{ $tag }}
                    </a>
                @endforeach
            </p>

            <p class="text-end mb-4">
              <a href="{{ route('articles.index') }}" class="article-link">Back to articles...</a>
            </p>

            <p class="text-end pe-3">
              <a href="{{ route('articles.edit', ['article' => $article->slug ]) }}"
                class="btn-default btn-edit-article">Edit
              </a>
              <a href="{{ route('articles.destroy', ['article' => $article->slug ]) }}"
                class="btn-default btn-delete-article">Delete
              </a>
            </p>

        </section>

    </div>

</div>

@endsection
