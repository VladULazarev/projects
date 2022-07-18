@extends('layouts.layout')

@section('content')

<div class="row content mt-5 mb-5">

    <div class="col-lg-6">

        <section class="article-cart relative break-words p-3 mt-3">

            <h5 class="mb-2">{{ $article->title }}</h5>

            <span class="article-author ps-2 mb-2">{{ $article->updated_at }} | </span>

            <span class="article-author mb-2">Author: </span>
            <a href="{{ route('articles.articles-by-author', ['author' => $article->user_id ]) }}"
              class="author-link mb-2">{{ $author->name }}
            </a>

            <p>{{ $article->body }}</p>

            <?php $tags = explode(', ', $article->tags); // Set array for foreach loop ?>
            <p>Tags:
                @foreach ($tags as $tag)
                    <a href="{{ route('articles.articles-by-tag', ['tag' => $tag ]) }}"
                      class="article-link">{{ $tag }}
                    </a>
                @endforeach
            </p>

            <p class="text-end pe-3 mb-4">
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
