<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/additional.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">
</head>
<body class="font-popins">
<?php
include("fungsi.php");
?>
<section class="w-full md:pt-24 md:pb-8 md:pl-10">
    <div class="container">
        <div class="flex flex-wrap mx-auto">
            <div class="pl-64 pt-5 float-right md:hidden block">
                <div class="flex">
                    <img class="w-6 md:w-8" src="./img/logonew.svg" alt="gunung">
                    <p class="text-lg font-semibold ml-4 md:text-xl tracking-wider">GoHike!</p>
                </div>
            </div>
            <div class="w-full items-center px-4 md:py-10 py-5 lg:w-1/2"> 
                <img class="rounded-lg" src="./img/mount3.jpg" alt="" width="1000" height="1000">
            </div>
            <div class="w-full py-1 px-5 md:py-10 md:px-20 lg:w-1/2">    
                <div class="w-56 pl-24 float-right hidden md:block">
                    <div class="flex">
                        <img class="w-6 md:w-8" src="./img/logonew.svg" alt="gunung">
                        <p class="text-lg font-semibold ml-4 md:text-xl tracking-wider">GoHike!</p>
                    </div>
                </div>
                <div class="inline-flex rounded-md shadow-md bg-gray-200 mt-3 md:mt-10" role="group">
                    <button id="login" type="button" class="py-2 px-10 text-sm font-medium text-gray-900 rounded-l-md hover:bg-[#F3B15F] hover:text-white focus:z-10 focus:ring-2 focus:ring-orange-300 focus:bg-[#F3B15F] focus:text-white">
                        Login
                    </button>
                    <button id="regis" type="button" class="py-2 px-10 text-sm font-medium text-gray-900 rounded-r-md hover:bg-[#F3B15F] hover:text-white focus:z-10 focus:ring-2 focus:ring-orange-300 focus:bg-[#F3B15F] focus:text-white">
                        Registrasi
                    </button>
                </div>
            
                <div class="w-full overflow-hidden my-5">
                    <div class="flex w-[200%]">
                        <!-- LOGIN -->
                        <form action="" id="loginform" class="w-1/2" method="post">
                            <h1 class="w-full text-2xl font-extrabold my-3">Login to your account</h1>
                            <!-- username -->
                            <div class="relative mb-3">
                                <input required type="text" id="floating_filled" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " name="username"/>
                                <label for="floating_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Username</label>
                            </div>
                            <!-- password -->
                            <div class="relative mb-3">
                                <input required type="password" id="floating_filled" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " name="pass"/>
                                <label for="floating_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Password</label>
                            </div>
                            <!-- checkbox -->
                            <div class="flex items-center">
                                <input checked id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ml-2 text-sm font-medium text-gray-900 ">Remember me</label> 
                            </div>
                            <!-- btn submit -->
                            <input type="submit" class="bg-[#F3B15F] hover:bg-orange-400 active:bg-orange-400 focus:outline-none focus:ring focus:ring-orange-300 py-2 px-8 my-5 text-gray-100 rounded-full self-end" value="Login" name="login">
                        </form>
                        <!-- REGISTRASI -->
                        <form id="regisform" action="" class="w-1/2" method="post">
                            <h1 class="w-full text-2xl font-extrabold my-3">Register your account</h1>
                            <!-- email -->
                            <div class="relative">
                                <input required type="email" id="floating_filled" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " name="email"/>
                                <label for="floating_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Email</label>
                            <!-- username -->
                            <div class="relative my-3">
                                <input required type="text" id="floating_filled" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " name="username"/>
                                <label for="floating_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Username</label>
                            </div>
                            <!-- password -->
                            <div class="relative mb-3">
                                <input required type="password" id="floating_filled" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " name="pass"/>
                                <label for="floating_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Password</label>
                            </div>
                            <!-- telepon -->
                            <div class="relative mb-3">
                                <input required type="text" id="floating_filled" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " name="telepon"/>
                                <label for="floating_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">No Telepon</label>
                            </div>
                            <!-- btn submit -->
                            <input type="submit" class="bg-[#F3B15F] hover:bg-orange-400 active:bg-orange-400 focus:outline-none focus:ring focus:ring-orange-300 py-2 px-8 my-5 text-gray-100 rounded-full self-end" value="Register" name="register">
                        </form>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</section>
<script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
<script src="./js/login.js"></script>
</body>
</html>