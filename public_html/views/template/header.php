
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quiz</title>
    <?= \quiz\assets\AssetBundle::printCss(); ?>
</head>

<body>

<header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Quiz Emulator</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="/">Эмулятор</a>
            <a class="p-2 text-dark" href="/?action=quizlist">История запусков</a>
        </nav>
    </div>
</header>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">