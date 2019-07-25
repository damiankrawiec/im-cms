<?php
session_start();
if(isset($_SESSION['image'])) {

    echo '<img src="layout/graphic/admin/'.$_SESSION['image'].'">';

}else header('Location: auth');