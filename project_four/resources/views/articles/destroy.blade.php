@extends('layouts.layout')

@section('content')

<div class="row content mt-5 mb-5">

    <div class="col-lg-6">

        <section class="article-cart relative break-words p-3 mt-3">

            <h5 class="mb-3">Are you sure to delete the article?</h5>

            <form method="POST" action="/articles/{{ $article->slug }}">
              @csrf
              @method("DELETE")

              <div class="btn-container mt-3">
                  <button type="submit" class="btn-default btn-delete-article">Delete</button>
                  <a href="{{ route('articles.show', ['article' => $article->slug ]) }}"
                    class="btn-default btn-edit-article">Back
                  </a>
              </div>

            </form>

        </section>

    </div>

</div>

@endsection
