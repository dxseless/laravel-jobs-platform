<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('heading', null, []); ?> 
        Jobs Listing
     <?php $__env->endSlot(); ?>

    <ul class="job-list">
        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="job-item">
                <a href="/jobs/<?php echo e($job->id); ?>" class="job-link">
                    <strong class="job-title"><?php echo e($job->title); ?></strong>
                    <span class="job-salary">Salary: <?php echo e($job->salary); ?> per month</span>
                    <span class="job-location">Location: <?php echo e($job->location); ?></span>
                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <div>
        <?php echo e($jobs->links()); ?>

    </div>

    <style>
        .job-list {
            list-style: none;
            padding: 0;
            margin: 0;
            max-width: 800px;
            margin: 0 auto;
        }

        .job-item {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 16px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .job-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .job-link {
            display: block;
            padding: 16px;
            text-decoration: none;
            color: inherit;
        }

        .job-title {
            font-size: 1.25rem;
            color: #333333;
            display: block;
            margin-bottom: 8px;
        }

        .job-salary, .job-location {
            font-size: 1rem;
            color: #666666;
            display: block;
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH /var/www/html/resources/views/jobs/index.blade.php ENDPATH**/ ?>