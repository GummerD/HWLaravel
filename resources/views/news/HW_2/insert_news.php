<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Insert news</title>
    <style type='text/css'>
    body {
        margin: 0;
        padding: 0;
        background-color: rosybrown;
    }

    div {
        display: flex;
        justify-content: center;
        font-size: 120%;
        font-family: Verdana, Arial, Helvetica, sans-serif;
        color: #333366;
        margin: 10px;
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
        <h1>Страница добавления новостей.</h1>
    </div>
    <div>
        <form action="" method="get">
            <div>
                <label for="category"><b>Insert category news</b></label>
                <input type="text" placeholder="Insert category news" name="category" size="30" required>
            </div>
            <div>
                <label for="title"><b>Title news</b></label>
                <input type="text" placeholder="Insert title news" name="title" size="30" required>
            </div>
            <div>
                <label for="text"><b>Text news</b></label>
                <input type="text" placeholder="Insert text news" name="text" size="100" required>
            </div>
            <div>
                <button type="submit">insert</button>
            </div>
        </form>
    </div>

</body>

</html>";