<?php $__env->startSection('content'); ?>
<div class="py-12 ">
  <div class="bg-gradient-to-tr from-cyan-200 via-blue-300 to-emerald-300 rounded-3xl shadow-2xl p-10">
    <h2 class="text-3xl font-extrabold mb-8 text-gray-900 tracking-wide">My Profile</h2>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <!-- Profile Picture Preview -->
    <?php if($user->profile_picture): ?>
        <div class="mb-6 text-center">
            <img src="<?php echo e(asset('storage/' . $user->profile_picture)); ?>"
                alt="Profile Picture"
                class="h-45 w-32 rounded-3xl mx-auto shadow-lg object-cover">
            <p class="text-gray-600 mt-2">Current Profile Picture</p>
        </div>
    <?php endif; ?>
    <!-- Profile Update Form -->
    <form action="<?php echo e(route('PublicUser.updateProfile', ['user_id' => Auth::id()])); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>"
                class="w-full border px-3 py-2 rounded" required>
        </div>
        <div class="mb-4">
            <label>Email</label>
            <input type="email" value="<?php echo e($user->email); ?>" class="w-full border px-3 py-2 rounded bg-gray-100" disabled>
        </div>
        <div class="mb-4">
            <label>Phone</label>
            <input type="text" name="phone" value="<?php echo e(old('phone',$user->publicuser->phone)); ?>"
                class="w-full border px-3 py-2 rounded">
        </div>
        <div class="mb-4">
            <label>Profile Picture</label><br>
            <!-- <?php if($user->profile_picture): ?>
                <div class="mb-6 text-center">
                    <img src="<?php echo e(asset('storage/' . $user->profile_picture)); ?>" 
                        alt="Profile Picture" 
                        class="h-32 w-32 rounded-full mx-auto shadow-lg object-cover">
                    <p class="text-gray-600 mt-2">Current Profile Picture</p>
                </div>
            <?php endif; ?> -->

            <input type="file" name="profile_picture">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Profile</button>
    </form>

    <hr class="my-6">

    <!-- Password Change Form -->
    <form action="<?php echo e(route('PublicUser.changePassword', ['user_id' => Auth::id()])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <h3 class="text-xl font-semibold mb-4">Change Password</h3>

        <div class="mb-4">
            <label>Current Password</label>
            <input type="password" name="current_password" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div class="mb-4">
            <label>New Password</label>
            <input type="password" name="new_password" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div class="mb-4">
            <label>Confirm New Password</label>
            <input type="password" name="new_password_confirmation" class="w-full border px-3 py-2 rounded" required>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Change Password</button>
    </form>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Sebenarnya\resources\views/PublicUser/profile.blade.php ENDPATH**/ ?>