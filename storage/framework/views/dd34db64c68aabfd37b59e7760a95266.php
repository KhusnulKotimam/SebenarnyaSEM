<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?> - MySebenarnya System</title>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <?php echo $__env->yieldPushContent('styles'); ?>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="antialiased bg-gray-50">
    <!-- Navigation -->
    <nav class="fixed w-full bg-white/90 backdrop-blur-md shadow-sm z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                        <img src="<?php echo e(asset('image/MCMC.png.webp')); ?>" class="h-20 w-20 object-contain" />
                            <span class="ml-2 text-xl font-bold gradient-text">MySebenarnya</span>
                        <a href="<?php echo e(route('dashboard')); ?>" class="text-xl font-bold text-gray-800"></a>
                    </div>

                    <!-- Primary Navigation for PublicUser -->
                    <?php if(Auth::user()->isPublicUser()): ?>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <a href="<?php echo e(route('PublicUser.dashboard', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('PublicUser.dashboard') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('PublicUser.dashboard') ? 'page' : ''); ?>">
                                    Dashboard
                                </a>

                                <a href="<?php echo e(route('PublicUser.profile', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('PublicUser.profile') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('PublicUser.profile') ? 'page' : ''); ?>">
                                    Profile
                                </a>

                                <a href="<?php echo e(route('PublicUser.InquiryForm', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('PublicUser.InquiryForm') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('PublicUser.InquiryForm') ? 'page' : ''); ?>">
                                    Inquiry Form
                                </a>
                                <a href="<?php echo e(route('PublicUser.InquiryHistory', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('PublicUser.InquiryHistory') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('PublicUser.InquiryHistory') ? 'page' : ''); ?>">
                                    Inquiry History
                                </a>
                                <!-- <a href="<?php echo e(route('PublicUser.InquiryStatus', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('PublicUser.InquiryStatus') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>" 
                                aria-current="<?php echo e(request()->routeIs('PublicUser.InquiryStatus') ? 'page' : ''); ?>">
                                    Inquiry Status
                                </a> -->
                                <a href="<?php echo e(route('PublicUser.PublicInquiry', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('PublicUser.PublicInquiry') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('PublicUser.PublicInquiry') ? 'page' : ''); ?>">
                                    Public Inquiry
                                </a>
                                <a href="<?php echo e(route('PublicUser.InquiryProgress', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('PublicUser.InquiryProgress') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('PublicUser.InquiryProgress') ? 'page' : ''); ?>">
                                    Inquiry Progress
                                </a>

                            <!-- Add more public user links here if needed -->
                        </div>
                        <?php elseif(Auth::user()->isMCMC()): ?>
                        <!-- Primary Navigation for MCMC -->
                         <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <a href="<?php echo e(route('MCMC.dashboard', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('MCMC.dashboard') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('MCMC.dashboard') ? 'page' : ''); ?>">
                                    Dashboard
                                </a>
                                <a href="<?php echo e(route('MCMC.UserData', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('MCMC.UserData') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('MCMC.UserData') ? 'page' : ''); ?>">
                                    User Data
                                </a>
                                <a href="<?php echo e(route('MCMC.InquiryList', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('MCMC.InquiryList') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('MCMC.InquiryList') ? 'page' : ''); ?>">
                                    Inquiry List
                                </a>
                                <a href="<?php echo e(route('MCMC.AssignedInquiry', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('MCMC.AssignedInquiry') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('MCMC.AssignedInquiry') ? 'page' : ''); ?>">
                                    Assigned Inquiry
                                </a>
                                <a href="<?php echo e(route('MCMC.InquiryProgress', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('MCMC.InquiryProgress') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('MCMC.InquiryProgress') ? 'page' : ''); ?>">
                                    Inquiry Progress
                                </a>

                                </div>
                        <?php elseif(Auth::user()->isAgency()): ?>
                        <!-- Primary Navigation for Agency -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <a href="<?php echo e(route('Agency.dashboard', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('Agency.dashboard') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('Agency.dashboard') ? 'page' : ''); ?>">
                                    Dashboard
                                </a>

                                <a href="<?php echo e(route('Agency.profile', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('Agency.profile') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('Agency.profile') ? 'page' : ''); ?>">
                                    Profile
                                </a>
                                <a href="<?php echo e(route('Agency.InquiryHistory', ['user_id' => Auth::id()])); ?>"
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('Agency.InquiryHistory') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('Agency.InquiryHistory') ? 'page' : ''); ?>">
                                    Inquiry History
                                </a>
                                <a href="<?php echo e(route('Agency.InquiryList', ['user_id' => Auth::id()])); ?>" 
                                class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5
                                <?php echo e(request()->routeIs('Agency.InquiryList') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'); ?>"
                                aria-current="<?php echo e(request()->routeIs('Agency.InquiryList') ? 'page' : ''); ?>">
                                    Inquiry List
                                </a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Right side -->
                <div class="flex items-center">
                    
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="ml-3">
                        <?php echo csrf_field(); ?>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="max-w-7xl mx-auto py-6 px-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\Sebenarnya\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>