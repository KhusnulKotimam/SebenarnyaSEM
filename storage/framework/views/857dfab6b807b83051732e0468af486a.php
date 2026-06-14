<?php $__env->startSection('content'); ?>
<div class="py-12">
    <div class="bg-gradient-to-tr from-blue-100 via-purple-100 to-pink-100 rounded-2xl shadow-xl p-8">

        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-extrabold text-gray-800 tracking-tight">Inquiry Progress Report</h2>
            <a href="<?php echo e(route('MCMC.AgencyPerfReport', ['user_id' => auth()->id()])); ?>"
               class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                📈 View Agency Performance Report
            </a>
        </div>

        <?php $__empty_1 = true; $__currentLoopData = $inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="border border-gray-300 rounded-lg mb-6 p-5 shadow-md bg-white">
                <div class="mb-3">
                    <h3 class="text-xl font-semibold text-gray-800"><?php echo e($inquiry->NewsTitle); ?></h3>
                    <p class="text-sm text-gray-600">From: <span class="font-medium"><?php echo e($inquiry->publicUser?->name ?? 'Unknown'); ?></span></p>
                    <p class="text-sm text-gray-600">Assigned to: <span class="font-medium"><?php echo e($inquiry->agency->user->name ?? 'Unknown Agency'); ?></span></p>
                    <p class="text-sm text-gray-600">Submitted on: <?php echo e($inquiry->created_at->format('d M Y')); ?></p>
                </div>

                <div class="mt-4">
                    <h4 class="font-semibold text-indigo-600 mb-2">Progress Updates:</h4>

                    <?php $__empty_2 = true; $__currentLoopData = $inquiry->progressUpdates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $progress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                        <div class="bg-gray-50 border-l-4 border-indigo-400 p-4 mb-3 rounded">
                            <p class="text-sm"><strong>Status:</strong> <?php echo e($progress->ProgressStatus); ?></p>
                            <p class="text-sm text-gray-700"><strong>Comment:</strong> <?php echo e($progress->ProgressDescription ?? '-'); ?></p>
                            <p class="text-xs text-gray-500 mt-1">
                                <strong>Reviewed by:</strong> <?php echo e($progress->ReviewingOfficer ?? 'N/A'); ?> |
                                <strong>Date:</strong> <?php echo e(\Carbon\Carbon::parse($progress->created_at)->format('d M Y h:i A')); ?>

                            </p>

                            <?php if($progress->SupportingDocument): ?>
                                <p class="text-xs mt-2">
                                    <a href="<?php echo e(asset('storage/' . $progress->SupportingDocument)); ?>" target="_blank" class="text-blue-600 hover:underline">
                                        📎 View Supporting Document
                                    </a>
                                </p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                        <p class="text-sm text-gray-500 italic">No progress updates yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center text-gray-600">No inquiries have been assigned yet.</p>
        <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\SebenarnyaSEM\resources\views/MCMC/InquiryProgress.blade.php ENDPATH**/ ?>