<?php if (count($errors) > 0): ?>
    <div class="error">
    <!-- Check each object in array and display it on screen -->
        <?php foreach ($errors as $error): ?> 
        <p> <?php echo $error; ?></p>
        <?php endforeach?>
    </div>
<?php endif ?>