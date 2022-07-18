@extends('layouts.layout')

@section('content')

<div class="row content mt-5 mb-5">

    <div class="col-lg-6">

        <section class="article-cart relative break-words p-3 mt-3">

            <h5 class="mb-3">Edit article</h5>

            <form method="POST" action="/articles/{{ $article->slug }}">
              @csrf
              @method("PUT")

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug"
                      class="form-control @error('slug') alert-border @enderror"
                      id="slug" maxlength="50"
                      value="{{ $article->slug }}"
                      placeholder="Slug"
                      autocomplete="off">

                      @error('slug')
                        <span class="laravel-alert">{{ $errors->first('slug') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="tags">Tags (Example: php, js, laravel)</label>
                    <input type="text" name="tags"
                      class="form-control @error('tags') alert-border @enderror"
                      id="tags" maxlength="50"
                      value="{{ $article->tags }}"
                      placeholder="Tags"
                      autocomplete="off">

                      @error('tags')
                        <span class="laravel-alert">{{ $errors->first('tags') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title"
                      class="form-control @error('title') alert-border @enderror"
                      id="title" maxlength="100"
                      value="{{ $article->title }}"
                      placeholder="Title" autocomplete="off">

                      @error('title')
                        <span class="laravel-alert">{{ $errors->first('title') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <input type="text" name="excerpt"
                      class="form-control @error('excerpt') alert-border @enderror"
                      id="excerpt"
                      value="{{ $article->excerpt }}"
                      maxlength="200"
                      placeholder="Excerpt" autocomplete="off">

                      @error('excerpt')
                        <span class="laravel-alert">{{ $errors->first('excerpt') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="article">Article</label>
                    <textarea class="form-control @error('body') alert-border @enderror" rows="5"
                      id="body" name="body"
                      placeholder="Article text"
                      cols="10"
                      autocomplete="off">{{ $article->body }}</textarea>

                      @error('body')
                        <span class="laravel-alert">{{ $errors->first('body') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="btn-container mt-4">
                  <button type="submit" class="btn-default btn-edit-article">Update</button>
              </div>


            </form>

            <p class="text-end pe-3 mb-4">
              <a href="{{ route('articles.show', ['article' => $article->slug ]) }}"
                class="article-link">Back To Article
              </a>
            </p>

        </section>

    </div>

</div>

@endsection
