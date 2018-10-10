<?php
/** @var \quiz\models\Question[] $questions */
/** @var int $userIQ */
/** @var int $rightAnswerCount */
?>

<h1>Результаты для тестируемого с IQ = <?= $userIQ ?></h1>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">ID</th>
        <th scope="col">Частота</th>
        <th scope="col">Сложность</th>
        <th scope="col">Правильность</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1 ?>
    <?php foreach ($questions as $question) {?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $question->getId() ?></td>
            <td><?= $question->getFrequency() ?></td>
            <td><?= $question->getDifficult() ?></td>
            <td><?= $question->getIsRightAnswer() ? '+' : '-' ?></td>
        </tr>
    <?php }?>
    </tbody>
</table>
<p>Тестируемый ответил правильно на <?= $rightAnswerCount?> вопросов из 40.</p>