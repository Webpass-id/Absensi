<!DOCTYPE html>
<html lang="en">
<?php include './components/header.php'; ?>

<body>
    <?php include './components/spinner.php'; ?>
    <?php include './components/sidebar.php'; ?>
    <!-- Content Start -->
    <?= $content ?? ''; ?>
    <!-- Gunakan echo, bukan include -->
    <?php include './components/script.php'; ?>
</body>

</html>