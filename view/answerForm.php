<?php include 'view/header.php'; ?>
    <main>
        <section>
            <div class='formContainer'>
                <div class='formBox'>
                    <form action='index.php' method='post'>
                        <h1 class='formHeading'>Answer the question!</h1>
                        <textarea name='answer' placeholder='Your answer'></textarea><br>
                        <input type="hidden" name="questionId" value="<?php echo $questionId; ?>">
                        <input type="hidden" name="action" value="post_answer">
                        <input type='submit' class='formButton' value='Post'><br>
                    </form>
                </div>
            </div>
        </section>
    </main>
<?php include 'view/footer.php'; ?>