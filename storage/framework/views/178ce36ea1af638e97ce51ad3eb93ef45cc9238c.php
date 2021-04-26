<h2 style="text-align:center">
<?php if($model->getUsername() == 'mark'): ?>
	<h3>Mark you have logged in successfully.</h3>
<?php else: ?>
	<h3>Someone besides Mark logged in successfully.</h3>
<?php endif; ?> 
</h2>