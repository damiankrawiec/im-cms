<?php
echo '<input type="submit" value="' . $this->makeTranslationSystem('run') . '" class="btn btn-danger run-package"> <span class="im-hide">'.$this->icon['process']['spin'].'</span>';
echo '<input type="hidden" name="package" value="' . $nextPackage . '">';
echo '<input type="hidden" name="id" value="' . $dataId . '">';
echo '<input type="hidden" name="transaction_package" value="'.$this->addition->transaction().'">';

$submit = true;