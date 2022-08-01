<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="canonical" href="http://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1d2021">

    <title>Laravel App</title>
    <meta name="description" content="My laravel app">

    <meta name="author" content="Vlad, https://www.getyoursite.info">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">

    <script src="/js/jquery-and-mobile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--[if lt IE 9]>
    <script src="https://static.stands4.com/app_common/js/libs/html5shiv.min.js"></script>
    <script src="https://static.stands4.com/app_common/js/libs/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

          <div class="row">

              <div class="col-lg-4">

                  <section class="show-articles article-cart relative break-words p-3 mt-3">
                      <h5>Show Articles</h5>
                  </section>

              </div>

              <div class="col-lg-4">

                  <section class="create-article article-cart relative break-words p-3 mt-3">
                      <h5>Create New Article</h5>
                  </section>

              </div>

              <div class="col-lg-4">

                  <section class="search-article article-cart relative break-words p-3 mt-3">
                    <div class="row g-3 align-items-center">
                      <form method="POST" action="/articles/tag/{tag}">
                        @csrf

                            <input type="text" id="search-article"
                            name="search-article" class="form-control"
                            autocomplete="off"
                            placeholder="Search by tag">

                      </form>
                    </div>
                  </section>

              </div>

          </div>

          <div class="content mt-5 mb-5">

              @yield('content')

              @if(Request::is('/'))
                  <img src="/images/create.jpg" class="img-fluid" alt="Home page">
              @endif

          </div>

    </div>

    <!-- JS SCRIPTS AND CSS -->
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
    <script async src="/js/app.js"></script>
  </body>
</html>
