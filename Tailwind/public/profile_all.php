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
<body class="scrollbar-thin scrollbar-thumb-emerald-700 scrollbar-track-emerald-200 font-popins">
    <?php
    session_start();
    include("fungsi.php");

    // Jika tidak ada session user (belum login)
    if (!isset($_SESSION["users"])) {
        // Diarahkan ke ke login.php
        echo "<script>alert('Silahkan login!')</script>";
        echo "<script>location='login.php';</script>";
    }
    ?>
    <section class="my-4 md:my-14">
        <!-- Desktop -->
        <div class="relative container">
            <div class="grid-cols-4 divide-x-2 hidden md:grid">
                <!-- btn navigation -->
                <div class="">
                    <!-- Sidebar -->
                    <aside class="w-full" aria-label="Sidebar">
                        <div class="overflow-y-auto py-4 px-3 rounded">
                           <div class="flex items-center pl-2.5 mb-5">
                              <img src="./img/logonew.svg" class="rounded-md h-5 mr-3 sm:h-7"/>
                              <span class="self-center text-xl text-gray-700 font-semibold whitespace-nowrap">GoHike!</span>
                           </div>
                           <ul class="space-y-2">
                                <li>
                                    <a href="#" id="btnprofil" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-100">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span class="flex-1 ml-3 whitespace-nowrap">Profile</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#" id="btneditprofil" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-100">
                                        <!-- <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Edit Profile</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" id="btnhistory" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-100">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Order History</span>
                                    </a>
                                </li>

                                <!-- id="btnbayar" -->
                                <!-- <li>
                                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Pembayaran</span>
                                    </a>
                                </li> -->
                                
                                <li>
                                    <a href="index.php" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Home</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <form method="post">
                                        <button class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-100" name="logout">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                                        </button>
                                    </form>
                                </li>
                           </ul>
                        </div>
                    </aside>
                </div>

                <div class="col-span-3">
                    <?php
                    $id_user = $_SESSION['users']['id_user'];
                    $ambilprofil = $koneksi->query("SELECT * FROM users WHERE id_user='$id_user'");
                    $dataprofil = $ambilprofil->fetch_assoc();
                    ?>
                    <!-- Profil -->
                    <div class="profile ml-20" id="profile">
                        <p class="py-7 ml-10 text-3xl font-bold">My Profile</p>
                    
                        <img class="w-52 h-52 ml-7 mb-5 p-1 rounded-full ring-2 ring-blue-300" src="./img/users/<?php echo $dataprofil['foto']; ?>" alt="Bordered avatar">

                        <div class="w-full my-3 py-5 px-5 mx-2 rounded-md">
                            <div>
                                <label class="block pb-2 text-gray-600">Nama</label>
                                <div class="w-1/2 outline-none mb-4 px-2 py-2 bg-blue-50 border border-blue-100 font-bold text-gray-600 rounded-md">
                                    <p><?php echo $dataprofil['username']; ?></p>
                                </div>
                            </div>
                            <div>
                                <label class="block pb-2 text-gray-600">Email</label>                                
                                <div class="w-1/2 outline-none mb-4 px-2 py-2 bg-blue-50 border border-blue-100 font-bold text-gray-600 rounded-md">
                                    <p><?php echo $dataprofil['email']; ?></p>
                                </div>    
                            </div>
                            <div>
                                <label class="block pb-2 text-gray-600">Password</label>
                                <div class="w-1/2 outline-none mb-4 px-2 py-2 bg-blue-50 border border-blue-100 font-bold text-gray-600 rounded-md">
                                    <p>*******</p>
                                </div>   
                            </div>
                            <div>
                                <label class="block pb-2 text-gray-600">No Telp</label>
                                <div class="w-1/2 outline-none mb-4 px-2 py-2 bg-blue-50 border border-blue-100 font-bold text-gray-600 rounded-md">
                                    <p><?php echo $dataprofil['telepon']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Profil -->
                    <div class="editprofile hidden ml-20" id="editprofile">
                        <p class="py-7 ml-10 text-3xl font-bold">Edit Profile</p>
                    
                        <img class="w-52 h-52 ml-7 mb-5 p-1 rounded-full ring-2 ring-gray-300" src="./img/users/<?php echo $dataprofil['foto']; ?>" alt="Bordered avatar">
                        <input class="hidden" type="file" accept="image/*" name="" id="file">
                        <label for="file" class="bg-emerald-600 text-gray-100 ml-14 p-2 rounded-md cursor-pointer hover:bg-emerald-600 shadow-emerald-400">
                            Choose your image
                        </label>

                        <form action="" method="post">
                            <div class="w-full my-3 py-5 px-5 mx-2 rounded-md">
                                <div>
                                    <label class="block pb-2 text-gray-600">Nama</label>
                                    <input class="w-1/2 outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="nama" id="" value="">
                                </div>
                                <div>
                                    <label class="block pb-2 text-gray-600">Email</label>
                                    <input class="w-1/2 outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="email" name="email" id="" value="">
                                </div>
                                <div>
                                    <label class="block pb-2 text-gray-600">Password</label>
                                    <input class="w-1/2 outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="password" name="password" id="" value="">
                                </div>
                                <div class="mb-3">
                                    <label class="block pb-2 text-gray-600">No Telp</label>
                                    <input class="w-1/2 outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="telp" id="" value="">
                                </div>
                                <button type="submit" class="bg-sky-600 text-center text-white py-2 px-14 rounded-md hover:bg-sky-700">
                                    Simpan
                                </button>
                            </div>
                        </form>

                    </div>

                    <!-- Order History -->
                    <div class="hidden ml-20" id="history">
                        <div class="w-full px-4 py-3">
                            <div class="mx-auto">
                                <div class="p-4 bg-white items-center">
                                    <p class="font-bold text-3xl mb-3">Riwayat Pembelian</p>
                                    <div class="relative shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-gray-500">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">No</th>
                                                    <th scope="col" class="px-6 py-3">Tanggal</th>
                                                    <th scope="col" class="px-6 py-3">Status</th>
                                                    <th scope="col" class="px-6 py-3">Total</th>
                                                    <th scope="col" class="px-6 py-3">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="bg-white border-b">
                                                    <td class="px-6 py-4">1</td>
                                                    <td class="px-6 py-4">15/06/2022</td>
                                                    <td class="px-6 py-4">
                                                        <span class="bg-red-200 text-red-500 py-1 px-2 rounded">
                                                            Belum Lunas
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4">Rp. 250.000,-</td>
                                                    <td class="flex px-6 py-4">
                                                        <!-- icon nota -->
                                                        <a href="#" class="hover:text-sky-500" title="Nota">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                            </svg>
                                                        </a>
                                                        <p class="px-2 text-gray-300">|</p>
                                                        <!-- icon bayar sekarang -->
                                                        <a href="#" id="btnbayar" class="hover:text-emerald-500" title="Pembayaran">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                            
                                                <tr class="bg-white border-b">
                                                    <td class="px-6 py-4">2</td>
                                                    <td class="px-6 py-4">15/06/2022</td>
                                                    <td class="px-6 py-4">
                                                        <span class="bg-emerald-200 text-emerald-500 py-1 px-2 rounded">
                                                            Lunas
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4">Rp. 250.000,-</td>
                                                    <td class="flex px-6 py-4">
                                                        <a href="#" title="Nota" class="hover:text-sky-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                            </svg>
                                                        </a>
                                                        <p class="px-2 text-gray-300">|</p>
                                                        <a href="#" id="btnviewbayar" title="Lihat Pembayaran" class="hover:text-emerald-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr class="bg-white border-b">
                                                    <td class="px-6 py-4">3</td>
                                                    <td class="px-6 py-4">15/06/2022</td>
                                                    <td class="px-6 py-4">
                                                        <span class="bg-blue-200 text-blue-500 py-1 px-2 rounded">
                                                            Waiting...
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4">Rp. 250.000,-</td>
                                                    <td class="flex px-6 py-4">
                                                        <a href="#" title="Nota" class="hover:text-sky-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                            </svg>
                                                        </a>
                                                        <p class="px-2 text-gray-300">|</p>
                                                        <a href="#" id="btnkonfbayar" title="Lihat Pembayaran" class="hover:text-emerald-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table> 
                                    </div>    
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Pembayaran -->
                    <div class="border border-gray-100 ml-20 pb-10 rounded shadow-md hidden" id="bayar">
                        <p class="py-7 pl-4 text-3xl text-center font-bold">Pembayaran</p><hr class="mx-10">

                        <div class="mx-10">
                            <div class="grid grid-cols-3 my-6">
                                <div>
                                    <p class="font-semibold text-gray-900">No Pemesanan</p>
                                    <p class="text-gray-500">B-007</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Tanggal Transaksi</p>
                                    <p class="text-gray-500">17/06/2022</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Total Pembayaran</p>
                                    <p class="text-gray-500">Rp. 200.000,-</p>
                                </div>
                            </div>

                            <div>
                                <form action="" method="post">
                                    <div>
                                        <label class="block pb-2 text-gray-600">Nama Penyetor</label>
                                        <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="nama" id="">
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Bank</label>
                                        <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="bank" id="">
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Total</label>
                                        <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="total" id="">
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Bukti Pembayaran</label>
                                        
                                        <div class="">
                                            <img class="w-40 h-40 mb-5 p-1 ring-1 ring-gray-300" src="./img/upload.svg" alt="Bordered avatar">
                                            <input class="hidden" type="file" accept="image/*" name="" id="file">
                                            <label for="file" class="bg-emerald-600 text-gray-100 p-2 rounded-md cursor-pointer hover:bg-emerald-600 shadow-emerald-400">
                                                Choose your image
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="bg-sky-600 mt-10 text-center text-white py-2 px-14 rounded-md hover:bg-sky-700">Simpan</button>
                                </form>
                            </div>
                        </div>

                    </div>

                    <!-- view pembayaran -->
                    <div class="border border-gray-100 ml-20 pb-10 rounded shadow-md hidden" id="viewbayar">
                        <p class="text-md text-emerald-500 font-semibold mx-10 mt-10 py-2">Payment confirmed</p>
                        <p class="text-4xl font-extrabold mx-10">Thanks for your order</p>

                        <div class="mx-10">
                            <div class="grid grid-cols-3 my-8">
                                <div>
                                    <p class="font-semibold text-gray-900">No Pemesanan</p>
                                    <p class="text-emerald-500">B-007</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Tanggal Transaksi</p>
                                    <p class="text-emerald-500">17/06/2022</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Total Pembayaran</p>
                                    <p class="text-emerald-500">Rp. 200.000,-</p>
                                </div>
                            </div>

                            <div>
                                <form action="" method="post">
                                    <div>
                                        <label class="block pb-2 text-gray-600">Nama Penyetor</label>
                                        <div class="w-full outline-none mb-4 px-2 py-1 border border-emerald-200 bg-emerald-50 font-bold text-gray-500 rounded-md">Aditya</div>
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Bank</label>
                                        <div class="w-full outline-none mb-4 px-2 py-1 border border-emerald-200 bg-emerald-50 font-bold text-gray-500 rounded-md">Mandiri</div>    
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Total</label>
                                        <div class="w-full outline-none mb-4 px-2 py-1 border border-emerald-200 bg-emerald-50 font-bold text-gray-500 rounded-md">Rp.320.000,-</div>
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Bukti Pembayaran</label>
                                        <img class="w-40 h-40 mb-5 p-1 ring-1 ring-emerald-200" src="./img/upload.svg">
                                        <!-- <div class="">
                                            <img class="w-40 h-40 mb-5 p-1 ring-1 ring-gray-300" src="./img/upload.svg" alt="Bordered avatar">
                                            <input class="hidden" type="file" accept="image/*" name="" id="file">
                                            <label for="file" class="bg-emerald-500 text-gray-100 p-2 rounded-md cursor-pointer hover:bg-emerald-600 shadow-emerald-400">
                                                Choose your image
                                            </label>
                                        </div> -->
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                     <!-- view konfirmasi bayar -->
                     <div class="border border-gray-100 ml-20 pb-10 rounded shadow-md hidden" id="konfbayar">
                        <p class="text-md text-blue-500 font-semibold mx-10 mt-10 py-2">Confirm payment waiting...</p>
                        <p class="text-4xl font-extrabold mx-10">Thanks for your order</p>

                        <div class="mx-10">
                            <div class="grid grid-cols-1 my-8">
                                <div>
                                    <p class="font-semibold text-gray-900">No Pemesanan</p>
                                    <p class="text-blue-500">B-007</p>
                                </div>
                                <div class="my-2">
                                    <p class="font-semibold text-gray-900">Tanggal Transaksi</p>
                                    <p class="text-blue-500">17/06/2022</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Total Pembayaran</p>
                                    <p class="text-blue-500">Rp. 200.000,-</p>
                                </div>
                            </div>

                            <div>
                                <form action="" method="post">
                                    <div>
                                        <label class="block pb-2 text-gray-600">Nama Penyetor</label>
                                        <div class="w-full outline-none mb-4 px-2 py-1 border border-blue-200 bg-blue-50 font-bold text-gray-500 rounded-md">Aditya</div>
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Bank</label>
                                        <div class="w-full outline-none mb-4 px-2 py-1 border border-blue-200 bg-blue-50 font-bold text-gray-500 rounded-md">Mandiri</div>    
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Total</label>
                                        <div class="w-full outline-none mb-4 px-2 py-1 border border-blue-200 bg-blue-50 font-bold text-gray-500 rounded-md">Rp.320.000,-</div>
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Bukti Pembayaran</label>
                                        <img class="w-40 h-40 mb-5 p-1 ring-1 ring-blue-200" src="./img/upload.svg">
                                        
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Mobile -->
        <div class="container md:hidden">
            <div class="block">
                <!-- navigation -->
                <div class="flex justify-between bg-gray-100 py-2 gap-1 px-3">
                    <div class="flex items-center ">
                        <img src="./img/logonew.svg" class="rounded-md h-5 mr-3 sm:h-7"/>
                        <span class="self-center text-xl text-gray-700 font-semibold whitespace-nowrap">GoHike!</span>
                    </div>
                    <div class="flex">
                        <ul>
                            <!-- profil -->
                            <li>
                                <a href="#" id="mobile_btnprof" title="profile" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-200">
                                    <!-- <span class="flex-1 whitespace-nowrap">Profile</span> -->
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                        
                        <ul>
                            <!-- edit profil -->
                            <li>
                                <a href="#" id="mobile_btnedprofil" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-200">
                                    <!-- <span class="flex-1 whitespace-nowrap">Edit Profile</span> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                        
                        <ul>
                            <!-- order history -->
                            <li>
                                <a href="#" id="mobile_btnorderhist" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-200">
                                    <!-- <span class="flex-1 whitespace-nowrap">Order History</span> -->
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
    
                        <ul>
                            <!-- home -->
                            <li>
                                <a href="index.html" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-200">
                                    <!-- <span class="flex-1 whitespace-nowrap">Logout</span> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </a>
                            </li>
                        </ul>

                        <ul>
                            <!-- logout -->
                            <li>
                                <a href="#" id="mobile_btnlogout" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-200">
                                    <!-- <span class="flex-1 whitespace-nowrap">Logout</span> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="container mt-10">
                    <!-- Profil -->
                    <div class="" id="mobile_prof">
                    
                        <img class="w-52 h-52 mb-5 p-1 mx-auto rounded-full ring-2 ring-blue-300" src="./img/person.svg" alt="Bordered avatar">

                        <div class="w-full my-3 py-5 px-5 rounded-md">
                            <div>
                                <label class="block pb-2 text-gray-600">Nama</label>
                                <div class="w-full outline-none mb-4 px-2 py-2 bg-blue-50 border border-blue-200 font-bold text-gray-600 rounded-md">
                                    <p id="bg-blue-300">Aditya W</p>
                                </div>
                            </div>
                            <div>
                                <label class="block pb-2 text-gray-600">Email</label>                                
                                <div class="w-full outline-none mb-4 px-2 py-2 bg-blue-50 border border-blue-200 font-bold text-gray-600 rounded-md">
                                    <p id="bg-blue-300">aditya@gmail.com</p>
                                </div>    
                            </div>
                            <div>
                                <label class="block pb-2 text-gray-600">Password</label>
                                <div class="w-full outline-none mb-4 px-2 py-2 bg-blue-50 border border-blue-200 font-bold text-gray-600 rounded-md">
                                    <p id="bg-blue-300">*******</p>
                                </div>   
                            </div>
                            <div>
                                <label class="block pb-2 text-gray-600">No Telp</label>
                                <div class="w-full outline-none mb-4 px-2 py-2 bg-blue-50 border border-blue-200 font-bold text-gray-600 rounded-md">
                                    <p id="bg-blue-300">0812298308</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Profil -->
                    <div class="hidden" id="mobile_edprof">
                        <p class="pb-4 text-3xl font-bold">Edit Profile</p>
                    
                        <img class="mx-auto w-52 h-52 mb-5 p-1 rounded-full ring-2 ring-gray-300" src="./img/person.svg" alt="Bordered avatar">
                        <input class="hidden" type="file" accept="image/*" name="" id="file">
                        <label for="file" class="bg-emerald-500 text-gray-100 p-2 ml-24 rounded-md cursor-pointer hover:bg-emerald-600 shadow-emerald-400">
                            Choose your image
                        </label>

                        <form action="" method="post">
                            <div class="w-full my-3 py-5 px-5 rounded-md">
                                <div>
                                    <label class="block pb-2 text-gray-600">Nama</label>
                                    <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="nama" id="">
                                </div>
                                <div>
                                    <label class="block pb-2 text-gray-600">Email</label>
                                    <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="email" name="email" id="">
                                </div>
                                <div>
                                    <label class="block pb-2 text-gray-600">Password</label>
                                    <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="password" name="password" id="">
                                </div>
                                <div>
                                    <label class="block pb-2 text-gray-600">No Telp</label>
                                    <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="telp" id="">
                                </div>
                                <button type="submit" class="bg-sky-600 text-center text-white py-2 px-14 rounded-md hover:bg-sky-700">Simpan</button>
                            </div>
                        
                        </form>
                    </div>

                    <!-- Order History -->
                    <div class="hidden" id="mobile_history">
                        <div class="w-full px-2 py-1">
                            <div class="mx-auto">
                                <div class="p-1 bg-white items-center">
                                    <p class="font-bold text-3xl mb-3">Riwayat Pembelian</p>
                                    
                                    <!-- <div class="relative shadow-md sm:rounded-lg overflow-x-auto">
                                        <table class="w-full text-sm text-left text-gray-500">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">No</th>
                                                    <th scope="col" class="px-6 py-3">Tanggal</th>
                                                    <th scope="col" class="px-6 py-3">Status</th>
                                                    <th scope="col" class="px-6 py-3">Total</th>
                                                    <th scope="col" class="px-6 py-3">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="bg-white border-b">
                                                    <td class="px-6 py-4">1</td>
                                                    <td class="px-6 py-4">15/06/2022</td>
                                                    <td class="px-6 py-4">
                                                        <span class="bg-red-200 flex text-red-500 py-1 px-2 rounded">
                                                            Belum Lunas
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4">Rp. 250.000,-</td>
                                                    <td class="flex px-6 py-4">
                                                        <a href="#" class="hover:text-sky-500" title="Nota">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                            </svg>
                                                        </a>
                                                        <p class="px-2 text-gray-300">|</p>
                                                        <a href="#" class="hover:text-emerald-500" title="Lihat Pembayaran">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                            
                                                <tr class="bg-white border-b">
                                                    <td class="px-6 py-4">2</td>
                                                    <td class="px-6 py-4">15/06/2022</td>
                                                    <td class="px-6 py-4">
                                                        <span class="bg-emerald-200 text-emerald-500 py-1 px-2 rounded">
                                                            Lunas
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4">Rp. 250.000,-</td>
                                                    <td class="flex px-6 py-4">
                                                        <a href="#" title="Nota" class="hover:text-sky-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                            </svg>
                                                        </a>
                                                        <p class="px-2 text-gray-300">|</p>
                                                        <a href="#" title="Lihat Pembayaran" class="hover:text-emerald-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table> 
                                    </div> -->
                                    
                                    <div class="grid grid-cols-1 divide-y-2 divide-slate-200 md:hidden">
                                        <div class="p-2">
                                            <div class="flex">
                                                <div class="w-1/2">
                                                    <span class="bg-emerald-200 text-sm text-emerald-500 py-1 px-8 rounded">
                                                        Lunas
                                                    </span>
                                                </div>
                                                <div class="flex">
                                                    <div class="flex-col">
                                                        <span class="mx-4 text-gray-500">25/06/2022</span>
                                                        <span class="text-orange-500 mx-4">Rp20.000,-</span>
                                                    </div>
                                                    <a href="#" class="text-gray-500 hover:text-sky-500 pr-2" title="Nota">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                    </a>
                                                    <a href="#" class="text-gray-500 hover:text-emerald-500" title="Lihat Pembayaran" id="mobile_btnviewbayar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <div class="flex">
                                                <div class="w-1/2">
                                                    <span class="bg-red-200 text-sm text-red-500 py-1 px-2 rounded">
                                                        Belum Lunas
                                                    </span>
                                    
                                                </div>
                                                <div class="flex">
                                                    <div class="flex-col">
                                                        <span class="mx-4 text-gray-500">25/06/2022</span>
                                                        <span class="text-orange-500 mx-4">Rp20.000,-</span>
                                                    </div>
                                                    <a href="#" class="text-gray-500 hover:text-sky-500 pr-2" title="Nota">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                    </a>
                                                    <a href="#" class="text-gray-500 hover:text-emerald-500" title="Pembayaran" id="mobile_btnbayar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <!-- <div class="flex">
                                                    
                                                </div> -->
                                                
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <div class="flex">
                                                <div class="w-1/2">
                                                    <span class="bg-blue-200 text-sm text-blue-500 py-1 px-5 rounded">
                                                        Waiting...
                                                    </span>
                                    
                                                </div>
                                                <div class="flex">
                                                    <div class="flex-col">
                                                        <span class="mx-4 text-gray-500">25/06/2022</span>
                                                        <span class="text-orange-500 mx-4">Rp20.000,-</span>
                                                    </div>
                                                    <a href="#" class="text-gray-500 hover:text-sky-500 pr-2" title="Nota">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                    </a>
                                                    <a href="#" class="text-gray-500 hover:text-emerald-500" title="Lihat Pembayaran" id="mobile_btnkonfbayar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <!-- <div class="flex">
                                                    
                                                </div> -->
                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pembayaran -->
                    <div class="border border-gray-100 pb-10 rounded shadow-md hidden" id="mobile_bayar">
                        <p class="py-7 pl-4 text-3xl text-center font-bold">Pembayaran</p><hr class="mx-10">

                        <div class="mx-10">
                            <div class="grid grid-cols-1 my-6">
                                <div>
                                    <p class="font-semibold text-gray-900">No Pemesanan</p>
                                    <p class="text-gray-500">B-007</p>
                                </div>
                                <div class="my-2">
                                    <p class="font-semibold text-gray-900">Tanggal Transaksi</p>
                                    <p class="text-gray-500">17/06/2022</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Total Pembayaran</p>
                                    <p class="text-gray-500">Rp. 200.000,-</p>
                                </div>
                            </div>

                            <div>
                                <form action="" method="post">
                                    <div>
                                        <label class="block pb-2 text-gray-600">Nama Penyetor</label>
                                        <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="nama" id="">
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Bank</label>
                                        <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="bank" id="">
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Total</label>
                                        <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="total" id="">
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Bukti Pembayaran</label>
                                        
                                        <div class="">
                                            <img class="w-40 h-40 mb-5 p-1 ring-1 ring-gray-300" src="./img/upload.svg" alt="Bordered avatar">
                                            <input class="hidden" type="file" accept="image/*" name="" id="file">
                                            <label for="file" class="bg-emerald-500 text-gray-100 p-2 rounded-md cursor-pointer hover:bg-emerald-600 shadow-emerald-400">
                                                Choose your image
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="bg-sky-600 text-center text-white mt-10 py-2 px-14 rounded-md hover:bg-sky-700">Simpan</button>
                                </form>
                            </div>
                        </div>

                    </div>

                    <!-- view pembayaran -->
                    <div class="border border-gray-100 pb-10 rounded shadow-md hidden" id="mobile_viewbayar">
                        <p class="text-md text-emerald-500 font-semibold mx-10 mt-10 py-2">Payment confirmed</p>
                        <p class="text-4xl font-extrabold mx-10">Thanks for your order</p>

                        <div class="mx-10">
                            <div class="grid grid-cols-1 my-8">
                                <div>
                                    <p class="font-semibold text-gray-900">No Pemesanan</p>
                                    <p class="text-emerald-500">B-007</p>
                                </div>
                                <div class="my-2">
                                    <p class="font-semibold text-gray-900">Tanggal Transaksi</p>
                                    <p class="text-emerald-500">17/06/2022</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Total Pembayaran</p>
                                    <p class="text-emerald-500">Rp. 200.000,-</p>
                                </div>
                            </div>

                            <div>
                                <form action="" method="post">
                                    <div>
                                        <label class="block pb-2 text-gray-600">Nama Penyetor</label>
                                        <div class="w-full outline-none mb-4 px-2 py-1 border border-emerald-200 bg-emerald-50 font-bold text-gray-500 rounded-md">Aditya</div>
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Bank</label>
                                        <div class="w-full outline-none mb-4 px-2 py-1 border border-emerald-200 bg-emerald-50 font-bold text-gray-500 rounded-md">Mandiri</div>    
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Total</label>
                                        <div class="w-full outline-none mb-4 px-2 py-1 border border-emerald-200 bg-emerald-50 font-bold text-gray-500 rounded-md">Rp.320.000,-</div>
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Bukti Pembayaran</label>
                                        <img class="w-40 h-40 mb-5 p-1 ring-1 ring-emerald-200" src="./img/upload.svg">
                                        
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <!-- view konfirmasi bayar -->
                    <div class="border border-gray-100 pb-10 rounded shadow-md hidden" id="mobile_konfbayar">
                        <p class="text-md text-blue-500 font-semibold mx-10 mt-10 py-2">Confirm payment waiting...</p>
                        <p class="text-4xl font-extrabold mx-10">Thanks for your order</p>

                        <div class="mx-10">
                            <div class="grid grid-cols-1 my-8">
                                <div>
                                    <p class="font-semibold text-gray-900">No Pemesanan</p>
                                    <p class="text-blue-500">B-007</p>
                                </div>
                                <div class="my-2">
                                    <p class="font-semibold text-gray-900">Tanggal Transaksi</p>
                                    <p class="text-blue-500">17/06/2022</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Total Pembayaran</p>
                                    <p class="text-blue-500">Rp. 200.000,-</p>
                                </div>
                            </div>

                            <div>
                                <form action="" method="post">
                                    <div>
                                        <label class="block pb-2 text-gray-600">Nama Penyetor</label>
                                        <div class="w-full outline-none mb-4 px-2 py-1 border border-blue-200 bg-blue-50 font-bold text-gray-500 rounded-md">Aditya</div>
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Bank</label>
                                        <div class="w-full outline-none mb-4 px-2 py-1 border border-blue-200 bg-blue-50 font-bold text-gray-500 rounded-md">Mandiri</div>    
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Total</label>
                                        <div class="w-full outline-none mb-4 px-2 py-1 border border-blue-200 bg-blue-50 font-bold text-gray-500 rounded-md">Rp.320.000,-</div>
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Bukti Pembayaran</label>
                                        <img class="w-40 h-40 mb-5 p-1 ring-1 ring-blue-200" src="./img/upload.svg">
                                        
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        
    </section>


    <script>
        // ===DESKTOP===
        
        // btn sidebar
        let btnprof = document.getElementById("btnprofil");
        let btn_edprof = document.getElementById("btneditprofil");
        let btnhist = document.getElementById("btnhistory");
        let btnbayar = document.getElementById("btnbayar");
        let btnview = document.getElementById("btnviewbayar");
        let btnkonf = document.getElementById("btnkonfbayar");

        // isi konten
        let prof = document.getElementById("profile");
        let edprof = document.getElementById("editprofile");
        let hist = document.getElementById("history");
        let bayar = document.getElementById("bayar");
        let viewbyr = document.getElementById("viewbayar");
        let konfbyr = document.getElementById("konfbayar");

        btnprof.onclick = function (){
            prof.style.display = "block"
            hist.style.display = "none";
            bayar.style.display = "none";
            edprof.style.display = "none";
            viewbyr.style.display = "none";
            konfbyr.style.display = "none";
        }

        // edit profil
        btn_edprof.onclick = function (){
            prof.style.display = "none";
            hist.style.display = "none";
            bayar.style.display = "none";
            viewbyr.style.display = "none";
            konfbyr.style.display = "none";
            edprof.style.display = "block";
        }

        // history
        btnhist.onclick = function (){
            prof.style.display = "none";
            edprof.style.display = "none";
            bayar.style.display = "none";
            viewbyr.style.display = "none";
            konfbyr.style.display = "none";
            hist.style.display = "block";
        }

        // pembayaran
        btnbayar.onclick = function (){
            prof.style.display = "none";
            edprof.style.display = "none";
            hist.style.display = "none";
            viewbyr.style.display = "none";
            konfbyr.style.display = "none";
            bayar.style.display = "block";
        }

        // view pembayaran
        btnview.onclick = function (){
            prof.style.display = "none";
            edprof.style.display = "none";
            hist.style.display = "none";
            bayar.style.display = "none";
            konfbyr.style.display = "none";
            viewbyr.style.display = "block";
        }

        // konfirmasi pembayaran
        btnkonf.onclick = function (){
            prof.style.display = "none";
            edprof.style.display = "none";
            hist.style.display = "none";
            bayar.style.display = "none";
            viewbyr.style.display = "none";
            konfbyr.style.display = "block";
        }

        // ==ANDRO==
        
        // btn sidebar
        let mbl_btnprof = document.getElementById("mobile_btnprof");
        let mbl_btn_edprof = document.getElementById("mobile_btnedprofil");
        let mbl_btnhist = document.getElementById("mobile_btnorderhist");
        let mbl_btnbayar = document.getElementById("mobile_btnbayar");
        let mbl_btnview = document.getElementById("mobile_btnviewbayar");
        let mbl_btnkonf = document.getElementById("mobile_btnkonfbayar");

        // isi konten
        let mbl_prof = document.getElementById("mobile_prof");
        let mbl_edprof = document.getElementById("mobile_edprof");
        let mbl_hist = document.getElementById("mobile_history");
        let mbl_bayar = document.getElementById("mobile_bayar");
        let mbl_viewbyr = document.getElementById("mobile_viewbayar");
        let mbl_konfbyr = document.getElementById("mobile_konfbayar");

        // view profil
        mbl_btnprof.onclick = function (){
            mbl_prof.style.display = "block";
            mbl_edprof.style.display = "none";
            mbl_hist.style.display = "none";
            mbl_bayar.style.display = "none";
            mbl_viewbyr.style.display = "none";
        }
        
        // view ed profil
        mbl_btn_edprof.onclick = function (){
            mbl_prof.style.display = "none";
            mbl_hist.style.display = "none";
            mbl_bayar.style.display = "none";
            mbl_viewbyr.style.display = "none";
            mbl_konfbyr.style.display = "none";
            mbl_edprof.style.display = "block";
        }

        // view history
        mbl_btnhist.onclick = function (){
            mbl_prof.style.display = "none";
            mbl_edprof.style.display = "none";
            mbl_bayar.style.display = "none";
            mbl_viewbyr.style.display = "none";
            mbl_konfbyr.style.display = "none";
            mbl_hist.style.display = "block";
        }

        // view pembayaran
        mbl_btnbayar.onclick = function (){
            mbl_prof.style.display = "none";
            mbl_edprof.style.display = "none";
            mbl_hist.style.display = "none";
            mbl_viewbyr.style.display = "none";
            mbl_konfbyr.style.display = "none";
            mbl_bayar.style.display = "block";
        }
        
        // viewbayar
        mbl_btnview.onclick = function (){
            mbl_prof.style.display = "none";
            mbl_edprof.style.display = "none";
            mbl_hist.style.display = "none";
            mbl_bayar.style.display = "none";
            mbl_konfbyr.style.display = "none";
            mbl_viewbyr.style.display = "block";
        }

        // konfirm bayar
        mbl_btnkonf.onclick = function (){
            mbl_prof.style.display = "none";
            mbl_edprof.style.display = "none";
            mbl_hist.style.display = "none";
            mbl_bayar.style.display = "none";
            mbl_viewbyr.style.display = "none";
            mbl_konfbyr.style.display = "block";
        }
    </script>
    <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>   
    
</body>
</html>