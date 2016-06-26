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

        /* The alert message box */
        .alert {
            padding: 20px;
            background-color: #f44336; /* Red */
            color: white;
            margin-bottom: 15px;
            opacity: 1;
            transition: opacity 0.6s; /* 600ms to fade out */
        }

        /* The success message box */

        .success {
            background-color: #4CAF50;
        }

        /* The close button */
        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        /* When moving the mouse over the close button */
        .closebtn:hover {
            color: black;
        }
    </style>

    <script>
        // Get all elements with class="closebtn"
        var close = document.getElementsByClassName("closebtn");
        var i;

        // Loop through all close buttons
        for (i = 0; i < close.length; i++) {
            // When someone clicks on a close button
            close[i].onclick = function(){

                // Get the parent of <span class="closebtn"> (<div class="alert">)
                var div = this.parentElement;

                // Set the opacity of div to 0 (transparent)
                div.style.opacity = "0";

                // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }
    </script>

    <script>
        function add_fields() {
            var div = document.createElement("div");
            div.innerHTML = '<p><label for="share">Share:</label><input type="text" name="shares[]" id="share"></p>\r\n';
            document.getElementById('secret_parts').appendChild(div);
        }
    </script>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    <div class="page-wrap">

        {{-- Header --}}
        {{-- http://www.w3schools.com/howto/howto_js_alert.asp --}}
        @if($status === 'error')
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <pre>
                    {{-- Return the error --}}
                    Error: {{ $response }}
                </pre>
            </div>
        @endif
        @if($status === 'success')
            <div class="alert success">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <pre>
                    {{-- If successfully generated shares --}}
                    @if($action === 'share')
                        Successfully generated shares.
                        Number of shares: {{ $shareAmount }}
                        Number of shares needed to recover secret: {{ $shareThreshold }}
                        Shares: {{ $response }}
                    @endif
                    {{-- If successfully decoded shares --}}
                    @if($action === 'recover')
                        Successfully recovered the secret.
                        Secret: {{ $response }}
                    @endif
                </pre>
            </div>
        @endif

        {{-- Content of page --}}
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
            <div id="secret_parts">
                <div>
                    {{-- Share --}}
                    <p><label for="share">Share:</label>
                        <input type="text" name="shares[]" id="share"></p>
                </div>
            </div>

            <input type="button" id="more_fields" onclick="add_fields();" value="Add more shares" />
            <input type="hidden" name="action" value="recover">
            <input value="Submit" type="submit">
        </form>

    </div>
    {{-- Footer --}}
    <footer class="site-footer">
        {{ $version }}
    </footer>
</body>
</html>