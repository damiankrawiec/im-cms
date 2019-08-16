<?php

echo $translation['login']['logged'].': ';

echo '<a href="'.$g_system.',user" class="text-white">'.$tool->getSession('admin')['email'].'</a>';

echo ' <a href="'.$g_system.',logout" class="text-warning">'.$icon['login']['end'].'</a>';