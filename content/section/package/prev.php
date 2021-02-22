<?php
echo '<input type="submit" value="' . $this->makeTranslationSystem('back') . '" class="btn btn-success run-package"> <span class="im-hide">'.$this->icon['process']['spin'].'</span>';
echo '<input type="hidden" name="package" value="' . $prevPackage . '">';
echo '<input type="hidden" name="id" value="' . $dataId . '">';
echo '<input type="hidden" name="transaction_package" value="'.$this->addition->transaction().'">';