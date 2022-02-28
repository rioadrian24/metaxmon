<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/css/style.css">


    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <title>Hello, world!</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/front/img/logo.png" width="60" alt="">
            </a>
        </div>
    </nav>

    @yield('content')

    <section id="footer" class="py-5">
        <div class="container">
            <div class="card border-0 shadow bg-dark">
                <div class="card-body py-4">
                    <div class="d-flex justify-content-between flex-column flex-lg-row flex-md-row">
                        <div class="mb-4 mb-lg-0 mb-md-0 text-center text-lg-start text-md-start align-self-center">
                            <a href="{{ banner()->link_whitepaper }}" class="text-white text-decoration-none h5 mx-2">WHITEPAPER</a>
                            <a href="{{ banner()->link_trustlink }}" class="text-white text-decoration-none h5 mx-2">TRUSTLINK</a>
                        </div>
                        <div class="mb-lg-0 mb-md-0 text-center text-lg-start text-md-start align-self-center">
                            @foreach (contacts() as $contact)
                            <a href="{{ $contact->link }}" class="text-white text-decoration-none h5 mx-2 me-lg-4 me-md-4">
                                <i class="{{ $contact->icon }}"></i>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('front/js/jquery-3.6.0.min.js') }}"></script>
    <script src="/front/js/script.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="/front/js/bootstrap.bundle.min.js"></script>

</body>

</html>