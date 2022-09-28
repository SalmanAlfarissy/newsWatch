<?php
$page=isset($_GET['page']) ? $_GET['page'] : 'Dashboard';
if ($page=='Dashboard') include 'dashboard.php';
if ($page=='User') include 'user.php';
if ($page=='Kategori') include 'kategori.php';
if ($page=='Berita') include 'berita.php';