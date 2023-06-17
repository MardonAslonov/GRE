<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <body>

        <h2>Radio Buttons</h2>

        <p>The <strong>input type="radio"</strong> defines a radio button:</p>

        <p>Choose your favorite Web language:</p>
        <form action="{{ route('b')}}">
            <input type="radio" id="html" name="answer" value="HTML">
            <label for="html">HTML</label><br>
            <input type="radio" id="css" name="answer" value="CSS">
            <label for="css">CSS</label><br>
            <input type="radio" id="javascript" name="answer" value="JavaScript">
            <label for="javascript">JavaScript</label><br><br>
            <input type="submit" value="Submit">
        </form>

    </body>
</body>

</html>
