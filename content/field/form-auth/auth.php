<?php
echo '<h4>' . $dataDisplay . '</h4>';
echo '<form method="post" class="auth">';
echo '<div class="form-group">';
echo '<label for="email">'.$this->makeTranslationSystem('email').'</label>';
echo '<input type="text" name="form_email" id="email" class="form-control validation :email" placeholder="' . $this->makeTranslationSystem('email') . '">';
echo '</div>';
echo '<div class="form-group">';
echo '<label for="password">'.$this->makeTranslationSystem('password').'</label>';
echo '<input type="password" id="password" class="form-control validation :text" placeholder="' . $this->makeTranslationSystem('password') . '">';
echo '</div>';
echo '<input type="hidden" name="form_password">';
echo '<input type="hidden" name="event" value="auth"> ';
echo '<input type="hidden" name="transaction" value="' . $this->addition->transaction() . '">';
echo '</form>';
echo '<button class="btn btn-secondary submit validation-run" id="auth">' . $this->makeTranslationSystem('login') . '</button>';
echo '<a href="'.$currentSectionUrl.',nowe-haslo" class="btn btn-light">' . $this->makeTranslationSystem('new-password') . '</a>';