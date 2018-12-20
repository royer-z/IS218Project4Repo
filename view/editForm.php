<?php include 'view/header.php'; ?>
<main>
    <section>
        <div class='formContainer'>
            <div class='formBox'>
                <form action='index.php' method='post'>
                    <h1 class='formHeading'>Edit the question!</h1>
                    <input type='text' name='questionName' value="<?php echo $question->getTitle(); ?>"><br>
                    <textarea name='questionBody'><?php echo $question->getBody(); ?></textarea><br>
                    <textarea name='questionSkills'><?php echo $question->getSkills(); ?></textarea><br>
                    <input type="hidden" name="questionId" value="<?php echo $question->getId(); ?>">
                    <input type="hidden" name="action" value="edit_question">
                    <input type='submit' class='formButton' value='Update'><br>
                </form>
            </div>
        </div>
    </section>
</main>
<?php include 'view/footer.php'; ?>
