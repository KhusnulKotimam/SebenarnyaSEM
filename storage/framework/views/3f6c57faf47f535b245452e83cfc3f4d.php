<?php $__env->startSection('content'); ?>
<div class="py-12 ">
  <div class="bg-gradient-to-tr from-cyan-200 via-blue-300 to-emerald-300 rounded-3xl shadow-2xl p-10">
    <h2 class="text-3xl font-extrabold mb-8 text-gray-900 tracking-wide">Submit New Inquiry</h2>
    <form method="POST" action="<?php echo e(route('PublicUser.storeInquiry', ['user_id' => Auth::id()])); ?>" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>

      <div class="mb-6">
        <label for="title" class="block text-gray-800 font-semibold mb-2">Title</label>
        <input
          type="text"
          id="title"
          name="title"
          class="w-full rounded-lg border border-gray-400 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
          required
          placeholder="Enter inquiry title"
        >
      </div>

      <div class="mb-6">
        <label for="content" class="block text-gray-800 font-semibold mb-2">Content</label>
        <textarea
          id="content"
          name="content"
          rows="5"
          class="w-full rounded-lg border border-gray-400 px-4 py-3 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
          required
          placeholder="Write the details of your inquiry here..."
        ></textarea>
      </div>

      <div class="mb-6">
        <label for="source" class="block text-gray-800 font-semibold mb-2">Source</label>
        <input
          type="text"
          id="source"
          name="source"
          class="w-full rounded-lg border border-gray-400 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
          required
          placeholder="Mention the source of your inquiry"
        >
      </div>

      <div class="mb-8">
        <label for="proof" class="block text-gray-800 font-semibold mb-2">Proof (Attachment)</label>
        <input
          type="file"
          id="proof"
          name="proof"
          accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
          class="w-full text-gray-700"
        >
        <p class="mt-1 text-sm text-gray-600">Accepted formats: JPG, PNG, PDF, DOC</p>
      </div>

      <div class="flex justify-end">
        <button
          type="submit"
          class="bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition"
        >
          Submit Inquiry
        </button>
      </div>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\SebenarnyaSEM\resources\views/PublicUser/InquiryForm.blade.php ENDPATH**/ ?>