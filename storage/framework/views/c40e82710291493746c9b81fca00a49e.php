<?php $__env->startSection('content'); ?>

<?php $__env->startPush('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<?php $__env->stopPush(); ?>

<div class="container my-5">
    <h2 class="text-center mb-4">Track Your Order Status</h2>

    <div class="timeline">
        <?php $__currentLoopData = $orderLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="timeline-step card border border-success p-3 mt-5 <?php echo e($log->new_status == $order->status ? 'active' : ''); ?>">
                <div class="timeline-icon">
                    <?php if($log->new_status == $order->status): ?>
                        <i class="bi bi-check-circle-fill text-success"></i>
                    <?php else: ?>
                        <i class="bi bi-clock text-muted"></i>
                    <?php endif; ?>
                </div>
                <div class="timeline-content">
                    <h5 class="fw-bold mb-1"><?php echo e(strtoupper($log->new_status)); ?></h5>
                    <p class="mb-1">
                        <?php switch($log->new_status):
                            case ('unpaid'): ?>
                                Waiting for payment.
                                <?php break; ?>
                            <?php case ('paid'): ?>
                                Your payment has been received.
                                <?php break; ?>
                            <?php case ('proceed'): ?>
                                Your order is being prepared.
                                <?php break; ?>
                            <?php case ('completed'): ?>
                                Order completed!
                                <?php break; ?>
                            <?php case ('cancelled'): ?>
                                Order cancelled.
                                <?php break; ?>
                        <?php endswitch; ?>
                    </p>
                    <small class="text-muted"><?php echo e($log->created_at->format('d M Y, H:i')); ?></small>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="text-center mt-4">
        <?php if($order->status == 'completed'): ?>
            <a href="<?php echo e(route('review.create', ['order' => $order->id])); ?>" class="btn btn-primary">
                <i class="bi bi-pencil"></i> Write a Review
            </a>
        <?php else: ?>
            <a href="<?php echo e(route('order.index')); ?>" class="btn btn-success">+ Place New Order</a>
        <?php endif; ?>
        <a href="/" class="btn btn-outline-secondary mt-2">
            <i class="bi bi-house"></i> Home
        </a>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .timeline {
        position: relative;
        padding-left: 30px;
        margin: 0 auto;
        max-width: 600px;
    }

    .timeline-step {
        position: relative;
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding-left: 60px;
    }

    .timeline-step::before {
        content: '';
        position: absolute;
        top: 0;
        left: 30px;
        width: 4px;
        height: 100%;
        background-color: #28a745;
    }

    .timeline-step:last-child::before {
        height: 50%;
    }

    .timeline-step .timeline-icon {
        position: absolute;
        top: 0;
        left: 10px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
    }

    .timeline-step.active .timeline-icon {
        background-color: #28a745;
        color: #fff;
    }

    .timeline-content {
        padding: 15px;
        background-color: #e9ecef;
        border-radius: 10px;
        width: 100%;
    }

    .timeline-step.active .timeline-content {
        background-color: #d4edda;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.pages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\Jokian\irji\coffeeshop\resources\views/order/show.blade.php ENDPATH**/ ?>