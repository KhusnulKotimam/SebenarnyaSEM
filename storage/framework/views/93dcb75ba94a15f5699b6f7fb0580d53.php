<?php $__env->startSection('content'); ?>
<div class="py-12">
    <div class="bg-gradient-to-tr from-blue-100 via-purple-100 to-pink-100 rounded-2xl shadow-xl p-8">
        <div class="mb-6">
            <a href="<?php echo e(route('MCMC.AssignedInquiry', ['user_id' => Auth::id()])); ?>"
            class="inline-block px-4 py-2 bg-indigo-500 text-white font-bold rounded hover:bg-indigo-700">
                ← Back to Assigned Inquiry
            </a>
        </div>
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Inquiry Assignment Report</h2>

        <!-- Filter Form -->
        <form method="GET" action="<?php echo e(route('MCMC.InquiryAssignReport', ['user_id' => Auth::id()])); ?>" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div>
                <label for="from_date" class="block text-sm font-medium text-gray-700">From Date</label>
                <input type="date" id="from_date" name="from_date" value="<?php echo e(request('from_date')); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="to_date" class="block text-sm font-medium text-gray-700">To Date</label>
                <input type="date" id="to_date" name="to_date" value="<?php echo e(request('to_date')); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="agency_id" class="block text-sm font-medium text-gray-700">Agency</label>
                <select name="agency_id" id="agency_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                    <option value="">All Agencies</option>
                    <?php $__currentLoopData = $agencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($agency->id); ?>" <?php echo e(request('agency_id') == $agency->id ? 'selected' : ''); ?>><?php echo e($agency->user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="self-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Generate Report</button>
            </div>
        </form>

        <div class="flex justify-end gap-4 mb-6">
            <a href="<?php echo e(route('MCMC.DownloadInquiryAssignReportPDF', ['user_id' => Auth::id(), 'start_date' => $startDate, 'end_date' => $endDate, 'agency_id' => $agencyId])); ?>"
                class="text-sm bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800">
                Download PDF
            </a>

            <a href="<?php echo e(route('MCMC.DownloadInquiryAssignReportExcel', ['user_id' => Auth::id(), 'start_date' => $startDate, 'end_date' => $endDate, 'agency_id' => $agencyId])); ?>"
                
                class="text-sm bg-green-600 text-white px-4 py-2 rounded hover:bg-green-800">
                Download Excel
            </a>
        </div>
        <!-- Chart -->
        <div class="mb-6">
            <canvas id="inquiryChart" height="100"></canvas>
        </div>

        <!-- Data Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto bg-white rounded-lg shadow">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Agency</th>
                        <th class="px-4 py-2 text-left">Inquiries Assigned</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $reportData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2"><?php echo e($row['agency']); ?></td>
                            <td class="px-4 py-2"><?php echo e($row['total']); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('inquiryChart');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_column($reportData, 'agency')); ?>,
            datasets: [{
                label: 'Inquiries Assigned',
                data: <?php echo json_encode(array_column($reportData, 'total')); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\SebenarnyaSEM\resources\views/MCMC/InquiryAssignReport.blade.php ENDPATH**/ ?>