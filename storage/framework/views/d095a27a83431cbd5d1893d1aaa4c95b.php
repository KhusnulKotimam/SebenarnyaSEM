<?php $__env->startSection('content'); ?>
<div class="py-12">
    <div class="bg-gradient-to-tr from-blue-100 via-purple-100 to-pink-100 rounded-2xl shadow-xl p-8">
        <h2 class="text-3xl font-extrabold text-center mb-8 text-gray-800 tracking-tight">Unassigned Inquiries</h2>
        <?php if(session('success')): ?>
            <div class="mb-6 px-4 py-3 rounded bg-green-100 text-green-800 font-semibold shadow">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Top Right Filter Button -->
        <div class="mb-6 text-right">
            <a href="<?php echo e(route('MCMC.FilteredInquiries', ['user_id' => Auth::id()])); ?>"
            class="inline-block px-4 py-2 bg-indigo-500 text-white font-bold rounded hover:bg-indigo-700">
                View Filtered Inquiries
            </a>
        </div>
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                <thead class="bg-gradient-to-r from-blue-400 to-purple-400 text-white sticky top-0 z-10">
                    <tr>
                        <th class="px-4 py-3 text-center font-semibold">No.</th>
                        <th class="px-4 py-3 text-center font-semibold">Sender Name</th>
                        <th class="px-4 py-3 text-center font-semibold">Inquiry</th>
                        <th class="px-4 py-3 text-center font-semibold">Date</th>
                        <th class="px-4 py-3 text-center font-semibold">Review</th>
                        <th class="px-4 py-3 text-center font-semibold">Assign To</th>
                        <th class="px-4 py-3 text-center font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="transition hover:bg-blue-50">
                        <td class="px-4 py-3 text-center text-gray-700 font-semibold"><?php echo e($index + 1); ?></td>
                        <td class="px-4 py-3 text-center">
                            <span class="inline-flex items-center gap-2">
                                <span class="bg-blue-200 text-blue-800 rounded-full px-3 py-1 text-xs font-bold">
                                    <?php echo e($inquiry->publicUser ? $inquiry->publicUser->name : 'N/A'); ?>

                                </span>
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="font-bold text-blue-700 mb-1"><?php echo e(strtoupper($inquiry->NewsTitle)); ?></div>
                            <?php if($inquiry->InquiryStatus == 'Rejected'): ?>
                                <span class="text-sm text-red-500">(Previously Rejected)</span>
                                <?php elseif($inquiry->InquiryStatus == 'Reviewed'): ?>
                                <span class="text-sm text-green-500">(Previously Reviewed)</span>
                            <?php endif; ?>
                            <div class="text-gray-600 text-sm"><?php echo e(\Illuminate\Support\Str::limit($inquiry->NewsContent, 80)); ?></div>
                        </td>
                        <td class="px-4 py-3 text-center text-gray-600">
                            <?php echo e(\Carbon\Carbon::parse($inquiry->created_at)->format('d M Y')); ?>

                        </td>
                        <td>
                            <a href="<?php echo e(route('MCMC.InquiryReview', ['user_id' => $user->id, 'inquiry_id' => $inquiry->id])); ?>"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Review
                            </a>
                        </td>
                        <td class="px-4 py-3">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="inquiry_id" value="<?php echo e($inquiry->id); ?>">
                            <select id="select_agency_<?php echo e($inquiry->id); ?>" class="w-full border border-gray-300 rounded-lg px-2 py-1 text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition">
                                <option value="">-- Select Agency --</option>
                                <?php $__currentLoopData = $agencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($agency->id); ?>" <?php echo e($inquiry->Agency_id == $agency->id ? 'selected' : ''); ?>>
                                        <?php echo e(strtoupper($agency->user->name)); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <button type="button"
                                    onclick="openAssignmentModal('<?php echo e($inquiry->id); ?>')"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Assign
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="px-4 py-10 text-center text-gray-400 text-lg">
                            No inquiries available.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            
        </div>
          <div class="flex justify-end mt-6">
                <a href="<?php echo e(route('MCMC.InquiryReport', ['user_id' => Auth::id()])); ?>"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                📈 View Inquiry Report
                </a>
            </div>

    </div>
</div>
<!-- Assignment Modal -->
<div id="assignmentModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Assign Inquiry</h3>

            <form id="assignmentForm" method="POST" action="<?php echo e(route('MCMC.AssignInquiry', ['user_id' => Auth::id()])); ?>" class="mt-4">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="inquiry_id" id="modal_inquiry_id">
                <input type="hidden" name="agency_id" id="modal_agency_id">
                
                <!-- Due Date -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="due_date">
                        Due Date
                    </label>
                    <input type="date" 
                           name="due_date" 
                           id="due_date"
                           required
                           min="<?php echo e(date('Y-m-d')); ?>"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Comments -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="comments">
                        Comments
                    </label>
                    <textarea name="comments" 
                              id="comments"
                              required
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              rows="5"></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end mt-4">
                    <button type="button" 
                            onclick="closeModal()"
                            class="mr-2 px-4 py-2 text-gray-500 bg-gray-200 rounded hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                        Assign
                    </button>
                </div>
            </form>

          
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function openAssignmentModal(inquiryId) {
    const select = document.getElementById('select_agency_' + inquiryId);
    const agencyId = select.value;

    if (!agencyId) {
        alert('Please select an agency first');
        return;
    }

    document.getElementById('modal_inquiry_id').value = inquiryId;
    document.getElementById('modal_agency_id').value = agencyId;

    document.getElementById('assignmentModal').classList.remove('hidden');
}
function closeModal() {
    document.getElementById('assignmentModal').classList.add('hidden');
    document.getElementById('assignmentForm').reset();
}

// Close modal when clicking outside
document.addEventListener('click', function(event) {
    const modal = document.getElementById('assignmentModal');
    const modalContent = modal.querySelector('div');
    if (event.target === modal) {
        closeModal();
    }
});
document.getElementById('assignmentForm').addEventListener('submit', function(e) {
    console.log('Form submitted');
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\SebenarnyaSEM\resources\views/MCMC/InquiryList.blade.php ENDPATH**/ ?>