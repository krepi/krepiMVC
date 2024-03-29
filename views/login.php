<?php
/** @var $model \app\models\User   */
?>
<h1> Login to an account</h1>
<?php $form = \app\core\form\Form::begin('', "post") ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordField() ?>

<button type="submit" class="btn btn-primary float-end">Submit</button>
<a href="/register" class="btn btn-success">No account? Register</a>

<?= \app\core\form\Form::end() ?>
