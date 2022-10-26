<?php

if(!isset($_SESSION)) {
    session_start();
}
$display = 'none';
if(isset($_SESSION['role'])){
    if($_SESSION['role'] == 0){
        $display = 'block';
    }
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="display: <?php echo $display; ?>">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Index</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="exit.php">Exit</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

