<?php
    session_start();
    session_destroy();
?>
<script>
    alert('You have successfully log out');
    location = "index.html";
</script>
