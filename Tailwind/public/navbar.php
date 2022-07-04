<!-- Header -->
<header class="absolute w-full z-50 px-4">
    <div class="container mx-auto py-4 px-2">
        <div class="flex items-center">
            <div class="w-56 pl-6 flex items-center">
                <img class="w-6 md:w-8" src="./img/logonew.svg" alt="gunung">
                <p class="text-lg font-semibold ml-4 md:text-xl tracking-wider">GoHike!</p>
            </div>

            <div class="w-full"></div>
                <!-- hamburg menu -->
                <div class="w-auto">
                    <ul id="menu" class="fixed flex-col invisible items-center justify-center opacity-0
                md:visible md:flex-row md:bg-transparent md:relative md:opacity-100 md:flex">
                        <li class="mx-5 py-5 md:py-0">
                            <a id="navlink" href="index.php" class="text-black hover:text-emerald-500">Home</a>
                        </li>
                        <li class="mx-5 py-5 md:py-0">
                            <a id="navlink" href="produk.php" class="text-black hover:text-emerald-500">Product</a>
                        </li>

                        <?php if (isset($_SESSION["users"])) : ?>
                        <div class="flex mx-8">
                            <img class="w-10 h-10 rounded-full" src="./img/users/<?php echo $_SESSION["users"]["foto"]; ?>" alt="Rounded avatar">
                                
                            <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-black font-medium rounded-lg text-sm px-3 text-center inline-flex items-center" type="button"><svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44">
                                <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownDefault">
                                    <li>
                                        <a href="data.php?halaman=profile" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                                    </li>
                                    <li>
                                        <form method="post">
                                            <input type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer" value="Logout" name="logout">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php else : ?>
                        <li class="mx-5 py-5 md:py-0">
                            <div class="rounded-3xl w-24 pl-5 py-2 bg-emerald-500 hover:bg-emerald-600 cursor-pointer">
                                <a href="login.php" class="text-white">Sign In</a> 
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- menu & cart -->
                <div class="w-auto">
                    <ul class="flex items-center">
                    <?php if (isset($_SESSION["users"])) : ?>
                        <img class="h-8 w-8 object-cover rounded-full mr-3 md:hidden" src="./img/users/<?php echo $_SESSION["users"]["foto"]; ?>"/>
                        <li class="ml-2">
                            <a href="cart.php" class="flex items-center justify-center w-8 h-8 text-black hover:text-emerald-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                </svg>
                            </a>
                        </li>

                        <li class="ml-2 mr-5 block md:hidden">
                            <button class="relative flex z-50 items-center justify-center" id="menu-toggler">
                                <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="focus:ring-2 focus:ring-emerald-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">    
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>    
                                </button>
                                <div id="dropdownInformation" class="z-10 hidden bg-white divide-y shadow-lg divide-gray-100 rounded w-44" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(392.8px, 1446.4px, 0px);">
                                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownInformationButton">
                                        <li>
                                            <a href="index.php" class="block px-4 py-2 hover:bg-gray-100">Home</a>
                                        </li>
                                        <li>
                                            <a href="produk.php" class="block px-4 py-2 hover:bg-gray-100">Product</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <a href="data.php?halaman=profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Profile</a>
                                        <form method="post">
                                            <input type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer" value="Logout" name="logout">
                                        </form>
                                    </div>
                                </div>
                            </button>
                        </li>
                        <?php else : ?>
                        <li class="ml-2 mr-5 block md:hidden">
                            <button class="relative flex z-50 items-center justify-center" id="menu-toggler">
                                <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="focus:ring-2 focus:ring-emerald-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">    
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>    
                                </button>
                                <div id="dropdownInformation" class="z-10 hidden bg-white divide-y shadow-lg divide-gray-100 rounded w-44" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(392.8px, 1446.4px, 0px);">
                                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownInformationButton">
                                        <li>
                                            <a href="index.php" class="block px-4 py-2 hover:bg-gray-100">Home</a>
                                        </li>
                                        <li>
                                            <a href="produk.php" class="block px-4 py-2 hover:bg-gray-100">Product</a>
                                        </li>
                                        <li>
                                            <a href="login.php" class="block px-4 py-2 ml-4 mb-2 rounded-3xl w-24 pl-5 py-2 bg-emerald-500 hover:bg-emerald-600 cursor-pointer">Sign In</a>
                                        </li>
                                    </ul>
                                </div>
                            </button>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>                
                
        </div>
        
    </div>
</header>
<script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>