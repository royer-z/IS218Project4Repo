<?php include 'view/header.php'; ?>
<main>
    <section>
        <div class="formContainer">
            <div class="formBox">
                <a href="?action=display_questions"><h2 class='formHeading whiteUnderline toggle'>Your questions</h2></a>
                <a href="?action=display_all_questions"><h2 class='formHeading whiteUnderline toggle'>All questions</h2></a>
                <br>
                <br>
                <h2 class='questionHeading'>Title:&nbsp;</h2><p class='questionContent'><?php echo $question->getTitle(); ?></p><br>
                <h2 class='questionHeading'>Body:&nbsp;</h2><p class='questionContent'><?php echo $question->getBody(); ?></p><br><br>
                <?php $answerCounter = 1; ?>
                <?php foreach ($question->getAnswers()->getAnswers() as $answer) : ?>
                    <hr>
                    <h2 class='questionHeading whiteUnderline'>Answer:</h2><p class='questionContent'>&nbsp;<?php echo $answerCounter; ?></p><br>
                    <p class='questionContent'>&nbsp;&nbsp;&nbsp;<?php echo $answer->getAnswer(); ?></p><br>
                    <?php $answerCounter++; ?>
                <?php endforeach; ?>
                <?php if ($question->getEmail() !== $_SESSION["email"]) : ?>
                    <form action="index.php" method="post">
                        <input type="hidden" name="questionId" value="<?php echo $question->getId(); ?>">
                        <input type="hidden" name="action" value="display_answer_form">
                        <input type="submit" value="Add answer" class='formButton'>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php include 'view/footer.php'; ?>
