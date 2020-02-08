<?php

echo $translation['login']['logged'].': ';

echo $tool->getSession('admin')['email'];

echo ' <a href="logout" class="text-warning">'.$icon['login']['end'].'</a>';