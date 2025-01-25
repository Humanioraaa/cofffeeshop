<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Leave a Review for <?php echo e($product->name); ?></h2>
    <form action="<?php echo e(route('review.store', $product->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1-5)</label>
            <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.pages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\Jokian\irji\coffeeshop\resources\views/order/review.blade.php ENDPATH**/ ?>