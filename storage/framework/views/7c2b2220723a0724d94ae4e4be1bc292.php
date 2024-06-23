<?php $__env->startSection('content'); ?>
<h1>Edit Attribute</h1>

<form action="<?php echo e(route('attributes.update',  ['id' => $id])); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <label>Title:</label>
    <input type="text" name="title" value="<?php echo e($productAttr->title); ?>" required>


    <button type="submit">Update Attribute</button>
</form>

<h2>Edit Options</h2>

<ul>
    <?php $__currentLoopData = $attrOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li>
        <?php echo e($option->title); ?> - <?php echo e($option->price); ?>

        <!-- Display other option fields as needed -->
        <form action="<?php echo e(route('attributes.deleteOption', $option->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit">Delete Option</button>
        </form>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/admin/attribute/edit.blade.php ENDPATH**/ ?>