<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Image Filter App</title>
    <style>
        .loader {

            position: absolute;
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #4dbf99;
            width: 12px;
            height: 12px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            top: 0;
            left: 35%;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <section>
        <div style="display: block; width:80%; margin: auto">
            <h1 class="heading" style="padding: 5px; background: #4dbf99;   color: white;">Image Filters App</h1>
            <div style="padding: 15px 5px; margin-top: 15px; background: #eee">
                <form id="my-form" method="POST" action="{{route('save-image')}}" enctype="multipart/form-data" style="display: grid;
    justify-content: center;">
                    {{ csrf_field() }}
                    <p>Please Uplaod image and submit to apply following filters.</p>
                    <ul style="list-style: arabic-indic">
                        <li>Blur</li>
                        <li>Rotate</li>
                        <li>GrayScale</li>
                    </ul>
                    <input type="file" name="image">
                    <button id="submit" type="submit" style="padding: 6px 4px;
    background: #4dbf99;
    width: 30%;
    font-size: 16px;
    color: white;
    border: none;
    cursor: pointer;
    margin: auto;
    margin-top: 25px; position: relative">Apply
                        <div id="hidden-div" style="display: none;" class="loader"></div>
                    </button>
                </form>
            </div>
        </div>
    </section>

</body>
<script>
    // Get the form element
    var form = document.getElementById("my-form");
    form.addEventListener("submit", function(event) {
        event.preventDefault();
        var div = document.querySelector("#hidden-div");
        div.style.display = "block";
        var btn = document.getElementById('submit');
        btn.disabled = true ;
    });
</script>

</html>