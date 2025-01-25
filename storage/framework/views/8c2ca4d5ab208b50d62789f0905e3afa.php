<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo e(route('order.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <h3>Select Products</h3>
        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <input type="checkbox" id="product-<?php echo e($product->id); ?>" name="products[<?php echo e($product->id); ?>][id]" value="<?php echo e($product->id); ?>">
            <label for="product-<?php echo e($product->id); ?>"><?php echo e($product->name); ?> (Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?>)</label>
            <input type="number" name="products[<?php echo e($product->id); ?>][quantity]" min="1" placeholder="Quantity">
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <button type="submit">Create Order</button>
    </form>
    <script>
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const quantityInput = this.nextElementSibling.nextElementSibling;
                quantityInput.disabled = !this.checked;
                if (!this.checked) quantityInput.value = '';
            });
        });
    </script>
</body>
</html>
<?php /**PATH D:\Project\Jokian\irji\coffeeshop\resources\views/order/create.blade.php ENDPATH**/ ?>