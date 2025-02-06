<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>

<body>
    <?php include 'spinner.php'; ?>
    <?php include 'sidebar.php'; ?>
    <!-- Content Start -->
            <?= $content ?? ''; ?> <!-- Gunakan echo, bukan include -->
    <?php include 'script.php'; ?>
</body>

</html>