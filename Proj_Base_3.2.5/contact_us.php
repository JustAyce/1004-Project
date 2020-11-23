
<html>
    <head>
        <title>World of Pets</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Bootstrap CSS-->
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity=
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">

        <!--Custom CSS-->
        <link rel="stylesheet" href="css/main.css">

        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <!--jQuery-->
        <script defer
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
        </script>

        <!--Bootstrap JS-->
        <script defer
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
                integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
                crossorigin="anonymous">
        </script>

        <!-- Custom JS -->
        <script defer
        src="js/main.js"></script>


    </head>
    <body>

        <?php
        session_start();
        include "nav.inc.php";
        ?>

        <main class="container">
            <h1>Contact Us</h1>

            <div id="frmContact">
                <div id="mail-status"></div>
                <div>
                    <label style="padding-top:20px;">Name</label><span id="userName-info" class="info"></span><br/>
                    <input type="text" name="userName" id="userName" class="demoInputBox">
                </div>
                <div>
                    <label>Email</label><span id="userEmail-info" class="info"></span><br/>
                    <input type="text" name="userEmail" id="userEmail" class="demoInputBox">
                </div>
                <div>
                    <label>Subject</label><span id="subject-info" class="info"></span><br/>
                    <input type="text" name="subject" id="subject" class="demoInputBox">
                </div>
                <div>
                    <label>Content</label><span id="content-info" class="info"></span><br/>
                    <textarea name="content" id="content" class="demoInputBox" cols="60" rows="6"></textarea>
                </div>
                <div>
                    <button name="submit" class="btnAction" onClick="sendContact();">Send</button>
                </div>
            </div>

        </main>
        <?php
        include "footer.inc.php";
        ?>

    </body>
</html>
