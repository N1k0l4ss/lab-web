<?php
/**
 * @var string $currentPage
 */
?>
<header class="header">
    <nav class="nav-header">
        <a class="nav-link <?='home'===$currentPage?'current':''?>" href="index.php">Home</a>
        <a class="nav-link <?='about'===$currentPage?'current':''?>" href="about.php">About me</a>
        <a class="nav-link <?='contact'===$currentPage?'current':''?>" href="contact.php">Contact me</a>
    </nav>
    <div class="logo">
        <img src="img/azalea-logo.png" alt="logo">
    </div>
</header>