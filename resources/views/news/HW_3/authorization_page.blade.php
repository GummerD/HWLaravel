<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Authorization page</title>
    <style type='text/css'>
    body {
        margin: 0;
        padding: 0;
        background-color: cyan;
    }

    div {
        display: flex;
        justify-content: center;
        font-size: 120%;
        font-family: Verdana, Arial, Helvetica, sans-serif;
        color: #333366;
    }

    h1 {
        font-size: 100%;
        font-family: Verdana, Arial, Helvetica, sans-serif;
        color: #333366;
    }
    </style>
</head>

<body>
    <div>
        <h1>Страница авторизации пользователя.</h1>
    </div>
    <div>
        <form action="" method="get">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </form>
    </div>

</body>

</html>";