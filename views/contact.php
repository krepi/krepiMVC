<?php
/** @var $this \app\core\View */
/** @var $model \app\models\ContactForm */

use app\core\form\TextareaField;
$this->title = 'Contact';
?>


<h1> Contact Us</h1>
<?php $form = \app\core\form\Form::begin('', "post") ?>
<?= $form->field($model, 'subject') ?>
<?= $form->field($model, 'email') ?>
<?= new TextareaField($model, 'body') ?>

<button type="submit" class="btn btn-primary float-end">Submit</button>
<!--<a href="/login" class="btn btn-success">Have account? Login</a>-->

<?= \app\core\form\Form::end() ?>


