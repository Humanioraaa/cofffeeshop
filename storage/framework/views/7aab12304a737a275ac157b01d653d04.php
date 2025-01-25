<?php $__env->startSection('content'); ?>
<div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_1">
        <div class="content_wrap">
            <h1 class="page_title">Order Status</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="index.html">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Order Status</span>
            </div>
        </div>
    </div>
</div>
<div class="page_content_wrap page_paddings_yes">
    <div class="content_wrap">
        <div class="content">
            <div class="list_products shop_mode_list">
                <nav class="woocommerce-breadcrumb">
                    <a href="#">Home</a>&nbsp;&#47;&nbsp;Order Status
                </nav>

                <ul class="products">
                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="product has-post-thumbnail column-1_2 last">
                        <a href="single-product.html" class="woocommerce-LoopProduct-link"></a>
                        <div class="post_item_wrap">
                            <div class="post_featured">
                                <div class="post_thumb">
                                    <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                                    <a class="hover_icon hover_icon_link" href="#">
                                        <img src="<?php echo e(asset('assets/images/services_3-300x281.png')); ?>" class="attachment-shop_catalog size-shop_catalog" alt="panini" title="panini" />
                                    </a>
                                <?php elseif(!auth()->check()): ?>
                                    <a href="<?php echo e(route('order.show', $p->id)); ?>">
                                        <img src="<?php echo e(asset('assets/images/services_3-300x281.png')); ?>" class="attachment-shop_catalog size-shop_catalog" alt="panini" title="panini" />
                                    </a>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="post_content">
                                <h3>
                                    <a href="single-product.html"> <?php echo e($p->username); ?> </a>
                                </h3>
                                <div class="description">
                                 <?php $__currentLoopData = $p->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p>
                                        Product Name: <?php echo e($detail->Product->name); ?> |
                                        Qty: <?php echo e($detail->quantity); ?> |
                                    </p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <span class="price">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">Rp.</span><?php echo e($p->total_price); ?>

                                    </span>
                                </span>
                                <?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?>
                                <?php if($p->status == 'paid'): ?>
                                <form action="<?php echo e(route('order.update', $p->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <input type="hidden" name="status" value="proceed">
                                    <button class="button product_type_simple add_to_cart_button" type="submit">Mark as Proceed</button>
                                </form>
                                <?php elseif($p->status == 'proceed'): ?>
                                    <form action="<?php echo e(route('order.update', $p->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <input type="hidden" name="status" value="completed">
                                        <button class="button product_type_simple add_to_cart_button" type="submit">Mark as Complete</button>
                                    </form>

                                <?php elseif($p->status == 'Unpaid'): ?>
                                Unpaid
                                <?php else: ?>
                                Done
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <nav id="pagination" class="pagination_wrap pagination_pages">
                    <?php if($order->hasPages()): ?>
                        <!-- Tombol 'Previous' -->
                        <?php if($order->onFirstPage()): ?>
                            <span class="pager_prev disabled">Previous</span>
                        <?php else: ?>
                            <a href="<?php echo e($order->previousPageUrl()); ?>" class="pager_prev">Previous</a>
                        <?php endif; ?>

                        <!-- Tampilkan halaman pertama jika tidak berada di halaman pertama -->
                        <?php if($order->currentPage() > 2): ?>
                            <a href="<?php echo e($order->url(1)); ?>" class="pager_number">1</a>
                            <?php if($order->currentPage() > 3): ?>
                                <span class="pager_dots">...</span>
                            <?php endif; ?>
                        <?php endif; ?>

                        <!-- Tampilkan 2 halaman di sekitar halaman aktif -->
                        <?php $__currentLoopData = range(max(1, $order->currentPage() - 1), min($order->lastPage(), $order->currentPage() + 1)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page == $order->currentPage()): ?>
                                <span class="pager_current active"><?php echo e($page); ?></span>
                            <?php else: ?>
                                <a href="<?php echo e($order->url($page)); ?>" class="pager_number"><?php echo e($page); ?></a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <!-- Tampilkan halaman terakhir jika tidak berada di halaman terakhir -->
                        <?php if($order->currentPage() < $order->lastPage() - 1): ?>
                            <?php if($order->currentPage() < $order->lastPage() - 2): ?>
                                <span class="pager_dots">...</span>
                            <?php endif; ?>
                            <a href="<?php echo e($order->url($order->lastPage())); ?>" class="pager_number"><?php echo e($order->lastPage()); ?></a>
                        <?php endif; ?>

                        <!-- Tombol 'Next' -->
                        <?php if($order->hasMorePages()): ?>
                            <a href="<?php echo e($order->nextPageUrl()); ?>" class="pager_next">Next</a>
                        <?php else: ?>
                            <span class="pager_next disabled">Next</span>
                        <?php endif; ?>
                    <?php endif; ?>
                </nav>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.pages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\Jokian\irji\coffeeshop\resources\views/order/admin/index.blade.php ENDPATH**/ ?>