<?php
$id_user = $_SESSION['users']['id_user'];
$ambil = $koneksi->query("SELECT * FROM users WHERE id_user='$id_user'");
$data = $ambil->fetch_assoc();
?>
<!-- Profil -->
<div class="profile ml-20 hidden md:block" id="profile">
    <p class="py-7 ml-10 text-3xl font-bold">My Profile</p>

    <img class="w-52 h-52 ml-7 mb-5 p-1 rounded-full ring-2 ring-blue-300" src="./img/users/<?php echo $data['foto']; ?>" alt="Bordered avatar">

    <div class="w-full my-3 py-5 px-5 mx-2 rounded-md">
        <div>
            <label class="block pb-2 text-gray-600">Nama</label>
            <div class="w-1/2 outline-none mb-4 px-2 py-2 bg-blue-50 border border-blue-100 font-bold text-gray-600 rounded-md">
                <p><?php echo $data['username']; ?></p>
            </div>
        </div>
        <div>
            <label class="block pb-2 text-gray-600">Email</label>
            <div class="w-1/2 outline-none mb-4 px-2 py-2 bg-blue-50 border border-blue-100 font-bold text-gray-600 rounded-md">
                <p><?php echo $data['email']; ?></p>
            </div>
        </div>
        <div>
            <label class="block pb-2 text-gray-600">No Telp</label>
            <div class="w-1/2 outline-none mb-4 px-2 py-2 bg-blue-50 border border-blue-100 font-bold text-gray-600 rounded-md">
                <p><?php echo $data['telepon']; ?></p>
            </div>
        </div>
    </div>
</div>

<!-- mobile Profil -->
<div class="md:hidden" id="mobile_prof">
    <p class="py-7 ml-10 text-3xl font-bold">My Profile</p>
    <img class="w-52 h-52 mb-5 p-1 mx-auto rounded-full ring-2 ring-blue-300" src="./img/users/<?php echo $data['foto']; ?>" alt="Bordered avatar">

    <div class="w-full my-3 py-5 px-5 rounded-md">
        <div>
            <label class="block pb-2 text-gray-600">Nama</label>
            <div class="w-full outline-none mb-4 px-2 py-2 bg-blue-50 border border-blue-200 font-bold text-gray-600 rounded-md">
                <p id="bg-blue-300"><?php echo $data['username']; ?></p>
            </div>
        </div>
        <div>
            <label class="block pb-2 text-gray-600">Email</label>
            <div class="w-full outline-none mb-4 px-2 py-2 bg-blue-50 border border-blue-200 font-bold text-gray-600 rounded-md">
                <p id="bg-blue-300"><?php echo $data['email']; ?></p>
            </div>
        </div>
        <div>
            <label class="block pb-2 text-gray-600">No Telp</label>
            <div class="w-full outline-none mb-4 px-2 py-2 bg-blue-50 border border-blue-200 font-bold text-gray-600 rounded-md">
                <p id="bg-blue-300"><?php echo $data['telepon']; ?></p>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    //desktop
    let btnprof = document.getElementById("btnprofil");
    let prof = document.getElementById("profile");

    btnprof.onclick = function() {
        prof.style.display = "block"
        hist.style.display = "none";
        bayar.style.display = "none";
        edprof.style.display = "none";
        viewbyr.style.display = "none";
    }

    //mobile
    let mbl_btnprof = document.getElementById("mobile_btnprof");
    let mbl_prof = document.getElementById("mobile_prof");

    mbl_btnprof.onclick = function() {
        mbl_prof.style.display = "block";
        mbl_edprof.style.display = "none";
        mbl_hist.style.display = "none";
        mbl_bayar.style.display = "none";
        mbl_viewbyr.style.display = "none";
    }
</script> -->