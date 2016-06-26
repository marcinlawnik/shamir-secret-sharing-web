<!doctype html>

<html lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ShamirSecretSharing in PHP</title>
    <meta name="description" content="ShamirSecretSharing in PHP">
    <meta name="author" content="marcinlawnik">

    <style>
        * {
            margin: 0;
        }
        html, body {
            height: 100%;
        }
        .page-wrap {
            min-height: 100%;
            /* equal to footer height */
            margin-bottom: -30px;
        }
        .page-wrap:after {
            content: "";
            display: block;
        }
        .site-footer, .page-wrap:after {
            height: 40px;
        }
        .site-footer {
            background: lightgray;
        }
    </style>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    <div class="page-wrap">

        @include('header')

        <h1>Share a secret:</h1>

        <form action="/" method="post">
            {{-- The secret to share --}}
            <p><label for="secret">Secret:</label>
                <input type="text" name="secret" id="secret"></p>
            {{-- The amoynt of shares --}}
            <p><label for="shares_amount">Amount of shares:</label>
                <input type="number" name="shares_amount" id="shares_amount"></p>
            {{-- Minimum number of shares required for decryption --}}
            <p><label for="shares_threshold">Minimum number of shares required for decryption:</label>
                <input type="number" name="shares_threshold" id="shares_threshold"></p>
            <input type="hidden" name="action" value="share">
            <input value="Submit" type="submit">
        </form>

        <h1>Recover a secret:</h1>

        <form action="/" method="post">
            {{-- A part of secret --}}
            <p><label for="secret">Secret:</label>
                <input type="text" name="secret" id="secret"></p>

            <input type="hidden" name="action" value="recover">
            <input value="Submit" type="submit">
        </form>

    </div>
    @include('footer')
</body>
</html>