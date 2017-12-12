<?php if(isset ($exception)): ?>
<div class="error"> 
<?php echo $exception; ?>
 
</div>
<a onclick="history.go(-1);">Voltar</a>
<?php endif; ?>

<?php if(isset ($message)): ?>
<div class="">
<?php if(isset ($message)) echo $message; ?>
</div> 
<?php endif; ?>
