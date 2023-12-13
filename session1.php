<?php
session_start();
?>
<html>
    <body>
        <?php
        $_SESSION["user"] = "kavi";
        ?>
        <a href="s.php">next page</a>
</body>
</html>
