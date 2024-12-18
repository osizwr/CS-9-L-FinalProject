
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="assets/css/styles.css">

        <title>SMS - Login</title>
    </head>
    <body>
        <div class="container">
            <div class="login__content">
                <img src="assets/img/bg-login.png" alt="login image" class="login__img">

                <form action="authentication.php" class="login__form" method="POST">
                    <div>
                        <h1 class="login__title">
                            <span>Welcome!</span>
                        </h1>
                        <p class="login__description">
                            Please login to continue.
                        </p>
                    </div>
                    
                    <div>
                        <div class="login__inputs">
                            <div>
                                <label for="username" class="login__label">Corporate Email:</label>
                                <input type="username" class="login__input" id="username" placeholder="Corporate Email" name="username" required>
                            </div>
                            <div>
                                <label for="password" class="login__label">Password:</label>
                                <div class="login__box">
                                    <input type="password" class="login__input" id="password" placeholder="Password" name="password" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="login__buttons">
                            <button type="submit" class="login__button">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
    </body>
</html>