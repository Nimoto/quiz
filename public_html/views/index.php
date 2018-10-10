<?php include_once('template/header.php') ?>
    <h1>Эмулятор</h1>
    <form method="post" class="quiz-settings row">
        <div class="form-group col-6 d-inline-block">
            <label for="minDiff">Минимальная сложность</label>
            <input type="number" class="form-control required" id="minDiff"
                   placeholder="0" value="0" pattern="\d [0-99]">
        </div>
        <div class="form-group col-6 d-inline-block">
            <label for="maxDiff">Максимальная сложность</label>
            <input type="number" class="form-control required" id="maxDiff"
                   placeholder="100"  value="100" pattern="\d [1-100]">
        </div>
        <div class="form-group col-12">
            <label for="userIQ">Интеллект тестируемого</label>
            <input type="number" class="form-control required" id="userIQ"
                   placeholder="50" value="50" pattern="\d [0-100]">
        </div>
        <div class="form-group col-12">
            <a href="#" type="submit" class="btn btn-primary emulate">Запустить эмулятор</a>
        </div>
    </form>
    <div class="ajax-field">
    </div>
<?php include_once('template/footer.php') ?>