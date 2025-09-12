<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    , shrink-to-fit=no--}}
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="">

    <title>@yield('title', 'Spela Beauty')</title>

    <link rel="icon" href="{{asset('/')}}img/spela_beauty3.jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap.min.css">
    <!--Lightbox-->
    <link rel="stylesheet" href="{{asset('/')}}css/lightbox.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('/')}}css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('/')}}css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('/')}}css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('/')}}css/flaticon.css">
    <link rel="stylesheet" href="{{asset('/')}}css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('/')}}css/magnific-popup.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('/')}}css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}css/mojStil.css">

    {{-- <script src="https://cdn.tiny.cloud/1/ktlstuy24v9as6p5qg3e7l69vgz3ygayvxf5s3cdu5oreyjf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '.textEditor',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            width: 600,
            height: 300,
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            // ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
            content_css: 'css/content.css',

        });
      </script> --}}

      <script src="https://cdn.tiny.cloud/1/ktlstuy24v9as6p5qg3e7l69vgz3ygayvxf5s3cdu5oreyjf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
    tinymce.init({
        selector: '.textEditor',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        width:800,
        height: 300,
        content_css: 'css/content.css',
    });
    </script>

<link rel="stylesheet" href="{{asset('/')}}css/responsive.css">
</head>
