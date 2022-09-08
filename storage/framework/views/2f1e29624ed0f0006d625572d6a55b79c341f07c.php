<!-- banner-bottom -->
<div class="banner-bottom">
    <h4 class="latest-text w3_latest_text pt-5">phim mới đề cử</h4>
    <div class="container text-center">
        <div class="w3_agile_banner_bottom_grid">
            <div id="owl-demo" class="owl-carousel owl-theme">
                <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                        <a href="<?php echo e(route('user.movie',$item->id)); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>"
                            class="hvr-shutter-out-horizontal">
                            <img src="<?php echo e('storage/app/poster/'.$item->poster_image); ?>"
                                title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>" class="img-responsive" alt=" " />
                            <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                        </a>
                        <div class="mid-1 agileits_w3layouts_mid_1_home">
                            <div class="w3l-movie-text">
                                <a href="<?php echo e(route('user.movie',$item->id)); ?>"
                                    title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>"><?php echo e($item->vie_name); ?></a>
                            </div>
                            <div class="mid-2 agile_mid_2_home">
                                <p>
                                    <?php $__currentLoopData = $year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item2->id==$item->year_id): ?>
                                    <?php echo e($item2->year); ?>

                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </p>
                                <div class="block-stars">
                                    <ul class="w3l-ratings">
                                        <p><?php echo e($item->time); ?></p>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="ribben">
                            <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item->language_id==$lang->id): ?>
                            <a href="<?php echo e(route('user.movie',$item->id)); ?>"
                                title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>">
                                <p><?php echo e($item->quality.'-'.$lang->language); ?></p>
                            </a>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="ribbennew">
                            <span
                                class="badge badge-pill badge-danger price2 text-center" style="margin-top:5px;">
                                <?php if($item->price==0): ?>
                                    Miễn phí
                                <?php else: ?>
                                <?php echo e(number_format(round($item->price)).'đ'); ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\webxemphim\resources\views/user/user_layout/slider.blade.php ENDPATH**/ ?>