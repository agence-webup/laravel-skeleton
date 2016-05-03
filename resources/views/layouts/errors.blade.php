<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ SEO::getTitle() }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

    html {
        color: #b0beC5;
        display: table;
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        height: 100%;
        text-align: center;
        width: 100%;
    }

    body {
        display: table-cell;
        vertical-align: middle;
        margin: 2em auto;
        line-height: 1.5;
    }

    h1 {
        font-size: 4em;
        font-weight: 400;
        margin-bottom: 0;
    }

    p {
        margin: 0 auto;
        width: 280px;
    }

    a,
    a:hover,
    a:visited {
        color: #B0BEC5;
        text-decoration: none;
    }

    .btn {
        display: inline-block;
        margin: 0;
        padding: .8rem 1rem;
        border: none;
        box-shadow: none;
        color: #fff;
        text-align: center;
        text-decoration: none;
        line-height: normal;
        cursor: pointer;
        border-radius: 4px;
    }

    .btn--primary:link,
    .btn--primary:hover,
    .btn--primary:visited {
        color: #fff;
        background-color: #2ecc71;
    }

    .actions {
        margin-top: 20px;
    }

    @media only screen and (max-width: 500px) {

        body, p {
            width: 95%;
        }

        h1 {
            font-size: 1.5em;
            margin: 0 0 0.3em;
        }
    }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
