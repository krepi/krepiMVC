<?php
/** @var $model \app\models\User   */
?>
<h1> Login to an account</h1>
<?php $form = \app\core\form\Form::begin('', "post") ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->passwordField() ?>

<button type="submit" class="btn btn-primary float-end">Submit</button>
<a href="/login" class="btn btn-success">Have account? Login</a>

<?= \app\core\form\Form::end() ?>
