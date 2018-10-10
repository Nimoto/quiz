<?php
/** @var \quiz\models\DataBaseQuiz[] $quizList */

include_once('template/header.php');
?>

    <h1>История запусков</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Интеллект</th>
            <th scope="col">Диапазон</th>
            <th scope="col">Результат</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($quizList as $quiz) { ?>
            <tr>
                <td><?= $quiz->getId() ?></td>
                <td><?= $quiz->getUserIQ() ?></td>
                <td><?= $quiz->getMinDifficult() ?> - <?= $quiz->getMaxDifficult() ?></td>
                <td><?= $quiz->getResult() ?> / 40</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


<?php
include_once('template/footer.php');
?>