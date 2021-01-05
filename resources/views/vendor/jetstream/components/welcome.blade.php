<div class="p-6 sm:px-20 bg-white border-b border-gray-200">

    <div class="mt-8 text-2xl">
        Welcome {{auth()->user()->name}}!
    </div>

    <div class="mt-6 text-gray-500">
        <!-- Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
        to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
        you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
        ecosystem to be a breath of fresh air. We hope you love it. -->
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3">
    <div class="p-4">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Clients</div>
        </div>

        <div class="ml-6">
            <div class="mt-2 text-sm text-gray-500">
                <ul>
                    <li class="flex text-sm mt-4"><img src="images/icons/user.svg" alt="" width="15px" class="mr-4">Lacey Wilson</li>
                    <li class="flex text-sm mt-4"><img src="images/icons/user.svg" alt="" width="15px" class="mr-4">Anisah Davie</li>
                    <li class="flex text-sm mt-4"><img src="images/icons/user.svg" alt="" width="15px" class="mr-4">Lynden Lawrence</li>
                    <li class="flex text-sm mt-4"><img src="images/icons/user.svg" alt="" width="15px" class="mr-4">Geoffrey Mayer</li>
                    <li class="flex text-sm mt-4"><img src="images/icons/user.svg" alt="" width="15px" class="mr-4">Regina Greenwood</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="p-4">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Remarks</div>
        </div>

        <div class="ml-6">
            <div class="mt-2 text-sm text-gray-500">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>
    <div class="p-4">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Details</div>
        </div>

        <div class="ml-6">
            <div class="mt-2 text-sm text-gray-500">
                <ul>
                    <li class="flex text-sm mt-4"><img src="images/icons/location.svg" alt="" width="15px" class="mr-4"> West Palm Beach, FL</li>
                    <li class="flex text-sm mt-4"><img src="images/icons/focus.svg" alt="" width="15px" class="mr-4"> Physician</li>
                    <li class="flex text-sm mt-4"><img src="images/icons/envelope.svg" alt="" width="15px" class="mr-4"> email@domain.com</li>
                    <li class="flex text-sm mt-4"><img src="images/icons/phone.svg" alt="" width="15px" class="mr-4"> +1 458 7412</li>
                </ul>
            </div>
        </div>
    </div>

</div>