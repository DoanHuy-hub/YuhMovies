<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <base href=" <?php echo e(asset("")); ?> ">
    <?php echo $__env->make('user.user_layout.import', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body>
	
    <?php echo $__env->make('user.user_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('user.user_layout.social', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.user_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script type="text/javascript">
        //Tự tắt thông báo
        $("div.alert").delay(10000).slideUp();
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\webxemphim\resources\views/user/master.blade.php ENDPATH**/ ?>