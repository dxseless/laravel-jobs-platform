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
        <?php echo e($job->title); ?>

     <?php $__env->endSlot(); ?>

    <p class="job-description"><?php echo e($job->description); ?></p>

    <div class="job-details">
        <div class="job-detail">
            <p class="job-detail-label">Salary</p>
            <p class="job-detail-value"><?php echo e($job->salary); ?> ₽</p>
        </div>
        <div class="job-detail">
            <p class="job-detail-label">Location</p>
            <p class="job-detail-value"><?php echo e($job->location); ?></p>
        </div>
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', $job)): ?>
        <div class="buttons">
            <a href="/jobs/<?php echo e($job->id); ?>/edit" class="button edit">Edit</a>
            <form action="/jobs/<?php echo e($job->id); ?>" method="POST" class="inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="button delete">Delete</button>
            </form>
        </div>
    <?php endif; ?>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .job-title {
            font-size: 2rem;
            font-weight: bold;
            color: #1a202c;
            margin-bottom: 20px;
        }

        .job-description {
            font-size: 1rem;
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .job-details {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .job-detail {
            flex: 1;
            background-color: #edf2f7;
            padding: 15px;
            border-radius: 6px;
            text-align: center;
        }

        .job-detail-label {
            font-size: 0.875rem;
            color: #718096;
            margin-bottom: 5px;
        }

        .job-detail-value {
            font-size: 1.25rem;
            font-weight: bold;
            color: #2d3748;
        }

        .buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button {
            display: flex;
            align-items: center;
            padding: 8px 22px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button.edit {
            background-color: #3b82f6;
            color: white;
        }

        .button.edit:hover {
            background-color: #2563eb;
        }

        .button.delete {
            background-color: #ff0000;
            color: white;
        }

        .button.delete:hover {
            background-color: #a61313;
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
<?php endif; ?><?php /**PATH /var/www/html/resources/views/jobs/show.blade.php ENDPATH**/ ?>