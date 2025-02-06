<?php 
ob_start();  // Mulai menangkap output
?>

<div class="container-fluid position-relative d-flex p-0">
      <!-- Content Start -->
<div class="content">
<?php include '../components/nav.php'; ?>
<div class="col-12">
<div class="bg-secondary rounded h-100 p-4">
<div class="button-table my-1">
    <h2 class="text-dark">Profil Kelas 10</h2>
<button class="border-0 bg-success text-white p-1 px-2 rounded">Export Excel</button>
<button class="border-0 bg-primary text-white p-1 px-2 rounded">Tambah Data</button>
</div>
<div class="table-responsive">
<table class="table">
<thead>
<tr class="titles bg-primary text-center">
<th class="text-white" style="border-radius: 10px 0 0 0" scope="col">Name</th>
<th class="text-white" scope="col">Tanggal Lahir</th>
<th class="text-white" scope="col">Jenis Kelamin</th>
<th class="text-white" scope="col">NIS</th>
<th class="text-white" scope="col">NISN</th>
<th class="text-white" style="border-radius: 0 10px 0 0" scope="col">Edit</th>
</tr>
</thead>
<tbody>
<tr class="text-center">
<th scope="row">John</th>
<td>11/08/2006</td>
<td>Pria</td>
<td>12345</td>
<td>12345</td>
<td>
<div class="icons d-flex justify-content-evenly">
    <button class="delete border-0 text-white bg-danger p-2 rounded">
        <i class="bi bi-trash-fill"></i>
    </button>
    <button class="edit border-0 text-white bg-primary p-2 rounded">
        <i class="bi bi-pencil-square"></i>
    </button>
</div>
</td>
</tr>
<tr class="text-center">
<th scope="row">John</th>
<td>11/08/2006</td>
<td>Pria</td>
<td>12345</td>
<td>12345</td>
<td>
<div class="icons d-flex justify-content-evenly">
    <button class="delete border-0 text-white bg-danger p-2 rounded">
        <i class="bi bi-trash-fill"></i>
    </button>
    <button class="edit border-0 text-white bg-primary p-2 rounded">
        <i class="bi bi-pencil-square"></i>
    </button>
</div>
</td>
</tr>
<tr class="text-center">
<th scope="row">John</th>
<td>11/08/2006</td>
<td>Pria</td>
<td>12345</td>
<td>12345</td>
<td>
<div class="icons d-flex justify-content-evenly">
    <button class="delete border-0 text-white bg-danger p-2 rounded">
        <i class="bi bi-trash-fill"></i>
    </button>
    <button class="edit border-0 text-white bg-primary p-2 rounded">
        <i class="bi bi-pencil-square"></i>
    </button>
</div>
</td>
</tr>
<tr class="text-center">
<th scope="row">John</th>
<td>11/08/2006</td>
<td>Pria</td>
<td>12345</td>
<td>12345</td>
<td>
<div class="icons d-flex justify-content-evenly">
    <button class="delete border-0 text-white bg-danger p-2 rounded">
        <i class="bi bi-trash-fill"></i>
    </button>
    <button class="edit border-0 text-white bg-primary p-2 rounded">
        <i class="bi bi-pencil-square"></i>
    </button>
</div>
</td>
</tr>
<tr class="text-center">
<th scope="row">John</th>
<td>11/08/2006</td>
<td>Pria</td>
<td>12345</td>
<td>12345</td>
<td>
<div class="icons d-flex justify-content-evenly">
    <button class="delete border-0 text-white bg-danger p-2 rounded">
        <i class="bi bi-trash-fill"></i>
    </button>
    <button class="edit border-0 text-white bg-primary p-2 rounded">
        <i class="bi bi-pencil-square"></i>
    </button>
</div>
</td>
</tr>
<tr class="text-center">
<th scope="row">John</th>
<td>11/08/2006</td>
<td>Pria</td>
<td>12345</td>
<td>12345</td>
<td>
<div class="icons d-flex justify-content-evenly">
    <button class="delete border-0 text-white bg-danger p-2 rounded">
        <i class="bi bi-trash-fill"></i>
    </button>
    <button class="edit border-0 text-white bg-primary p-2 rounded">
        <i class="bi bi-pencil-square"></i>
    </button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<?php
$content = ob_get_clean(); // Ambil output yang tertangkap
include '../components/layout.php' ?>