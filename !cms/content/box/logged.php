<?php

echo $translation['login']['logged'].': ';

echo '<a href="user" class="text-white">'.$tool->getSession('admin')['email'].'</a>';

echo ' <a href="logout" class="text-warning">'.$icon['login']['end'].'</a>';