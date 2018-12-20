<?php include 'view/header.php'; ?>
<main>
    <section>
        <div class="formContainer">
            <div class="formBox">
                <h1 class='formHeading'>Welcome&nbsp;<?php echo $user->getFirstName(); ?>&nbsp;<?php echo $user->getLastName(); ?>!</h1>
                <a href="?action=display_questions"><h2 class='formHeading whiteUnderline toggle'>Your questions</h2></a>
                <a href="?action=display_all_questions"><h2 class='formHeading whiteUnderline toggle'>All questions</h2></a>
                <br>
                <?php $questionCounter = 1; ?>
                <?php foreach ($questions->getQuestions() as $question) : ?>
                    <hr>
                    <h2 class='questionHeading whiteUnderline'>Question:</h2><p class='questionContent'>&nbsp;<?php echo $questionCounter; ?></p><br>
                    <h2 class='questionHeading'>Title:&nbsp;</h2><p class='questionContent'><?php echo $question->getTitle(); ?></p><br>
                    <h2 class='questionHeading'>Body:&nbsp;</h2><p class='questionContent'><?php echo $question->getBody(); ?></p><br><br>
                    <?php $questionCounter++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php include 'view/footer.php'; ?>