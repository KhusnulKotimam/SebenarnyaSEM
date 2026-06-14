<?php $__env->startSection('content'); ?>
<div class="py-12">
    <div class="bg-gradient-to-tr from-blue-100 via-purple-100 to-pink-100 rounded-2xl shadow-xl p-8">
        <h2 class="text-3xl font-extrabold text-center mb-8 text-gray-800 tracking-tight">Assigned Inquiries</h2>
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                <thead class="bg-gradient-to-r from-blue-400 to-purple-400 text-white sticky top-0 z-10">
                    <tr>
                        <th class="px-4 py-3 text-center font-semibold">No.</th>
                        <th class="px-4 py-3 text-center font-semibold">Title</th>
                        <th class="px-4 py-3 text-center font-semibold">Assigned Agency</th>
                        <th class="px-4 py-3 text-center font-semibold">Status</th>
                        <th class="px-4 py-3 text-center font-semibold">Date Assigned</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $assignedInquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="transition hover:bg-blue-50">
                        <td class="px-4 py-3 text-center text-gray-700 font-semibold"><?php echo e($index + 1); ?></td>
                        <td class="px-4 py-3 text-center">
                            <span class="font-bold text-blue-700"><?php echo e($inquiry->NewsTitle); ?></span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="bg-purple-200 text-purple-800 rounded-full px-3 py-1 text-xs font-bold">
                                <?php echo e($inquiry->agency ? $inquiry->agency->user->name : 'N/A'); ?>

                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold
                                <?php echo e($inquiry->InquiryStatus === 'Resolved' ? 'bg-green-100 text-green-700' : ($inquiry->InquiryStatus === 'In Progress' ? 'bg-orange-100 text-orange-700' : 'bg-yellow-100 text-yellow-700')); ?>">
                                <?php echo e($inquiry->InquiryStatus); ?>

                            </span>
                        </td>
                        <td class="px-4 py-3 text-center text-gray-600">
                            <?php echo e(\Carbon\Carbon::parse($inquiry->updated_at)->format('d M Y')); ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="px-4 py-10 text-center text-gray-400 text-lg">
                            No assigned inquiries found.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mt-6">
            <a href="<?php echo e(route('MCMC.InquiryAssignReport', ['user_id' => Auth::id()])); ?>"
            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                📈 View Assignment Report
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\SebenarnyaSEM\resources\views/MCMC/AssignedInquiry.blade.php ENDPATH**/ ?>