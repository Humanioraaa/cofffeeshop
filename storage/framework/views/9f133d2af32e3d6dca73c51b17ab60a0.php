<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo e(route('product.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo e($product->name); ?>" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" value="<?php echo e($product->price); ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description"><?php echo e($product->description); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <?php if($product->image_path): ?>
                <div class="mb-2">
                    <img src="<?php echo e(asset('storage/' . $product->image_path)); ?>" alt="<?php echo e($product->name); ?>" style="width: 150px; height: auto;">
                </div>
            <?php endif; ?>
            <input type="file" class="form-control" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>
<?php /**PATH D:\Project\Jokian\irji\coffeeshop\resources\views/product/edit.blade.php ENDPATH**/ ?>