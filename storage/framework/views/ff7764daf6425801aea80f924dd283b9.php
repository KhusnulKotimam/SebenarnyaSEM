<?php $__env->startSection('content'); ?>
<div class="py-12">
    <div class="bg-gradient-to-tr from-cyan-200 via-blue-300 to-emerald-300 rounded-2xl shadow-xl p-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Public Verified Inquiries</h2>

        <table class="min-w-full table-auto bg-white rounded shadow">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">Title</th>
                    <th class="px-4 py-2 text-left">Date</th>
                    <th class="px-4 py-2 text-left">Verification Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $latestProgress = $inquiry->progress->sortByDesc('created_at')->first();
                    ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 font-medium text-gray-800"><?php echo e($inquiry->NewsTitle); ?></td>
                        <td class="px-4 py-2 text-gray-600"><?php echo e($inquiry->created_at->format('d M Y')); ?></td>
                        <td class="px-4 py-2">
                            <?php if($latestProgress): ?>
                                <?php if($latestProgress->ProgressStatus === 'Verified as True'): ?>
                                    <span class="text-green-600 font-semibold">Verified True</span>
                                <?php elseif($latestProgress->ProgressStatus === 'Identified as Fake'): ?>
                                    <span class="text-red-600 font-semibold">Fake News</span>
                                <?php else: ?>
                                    <span class="text-gray-600"><?php echo e($latestProgress->ProgressStatus); ?></span>
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="text-gray-400 italic">No status</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3" class="px-4 py-4 text-center text-gray-500">No verified inquiries available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\SebenarnyaSEM\resources\views/PublicUser/PublicInquiry.blade.php ENDPATH**/ ?>