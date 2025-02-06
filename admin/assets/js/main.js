(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($("#spinner").length > 0) {
                $("#spinner").removeClass("show");
            }
        }, 1);
    };
    spinner();

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
        return false;
    });

    // Sidebar Toggler
    $(".sidebar-toggler").click(function () {
        $(".sidebar, .content").toggleClass("open");
        return false;
    });

    // Progress Bar
    $(".pg-bar").waypoint(
        function () {
            $(".progress .progress-bar").each(function () {
                $(this).css("width", $(this).attr("aria-valuenow") + "%");
            });
        },
        { offset: "80%" }
    );

    // Calender
    $("#calender").datetimepicker({
        inline: true,
        format: "L",
    });

    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
        nav: false,
    });

    // Chart Global Color
    Chart.defaults.color = "#6C7293";
    Chart.defaults.borderColor = "#000000";

    // Absensi Harian
    var ctx3 = $("#line-chart").get(0).getContext("2d");
    var myChart3 = new Chart(ctx3, {
        type: "line",
        data: {
            labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"], // Hari-hari dalam seminggu
            datasets: [
                {
                    label: "Masuk", // Data kehadiran
                    fill: false, // Tidak mengisi area di bawah garis
                    borderColor: "rgba(54, 162, 235, 1)", // Warna garis (biru)
                    backgroundColor: "rgba(54, 162, 235, 0.5)", // Warna titik
                    tension: 0, // Garis lurus, tidak melengkung
                    pointRadius: 4, // Ukuran titik lebih besar
                    pointBackgroundColor: "rgba(54, 162, 235, 1)", // Warna titik
                    pointHoverRadius: 10, // Ukuran titik saat di-hover
                    data: [5, 4, 5, 3, 4], // Jumlah yang masuk per hari
                },
                {
                    label: "Sakit", // Data sakit
                    fill: false,
                    borderColor: "rgba(255, 206, 86, 1)", // Warna garis (kuning)
                    backgroundColor: "rgba(255, 206, 86, 0.5)",
                    tension: 0,
                    pointRadius: 4,
                    pointBackgroundColor: "rgba(255, 206, 86, 1)", // Warna titik
                    pointHoverRadius: 10,
                    data: [1, 0, 1, 2, 1], // Jumlah sakit per hari
                },
                {
                    label: "Alpha", // Data alpha
                    fill: false,
                    borderColor: "rgba(235, 22, 22, 1)", // Warna garis (merah)
                    backgroundColor: "rgba(235, 22, 22, 0.5)",
                    tension: 0,
                    pointRadius: 4,
                    pointBackgroundColor: "rgba(235, 22, 22, 1)", // Warna titik
                    pointHoverRadius: 10,
                    data: [0, 1, 0, 4, 0], // Jumlah alpha per hari
                },
            ],
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: "Hari", // Judul untuk sumbu X
                    },
                },
                y: {
                    beginAtZero: true, // Mulai dari nol
                    title: {
                        display: true,
                        text: "Jumlah Kehadiran", // Judul untuk sumbu Y
                    },
                    ticks: {
                        stepSize: 1, // Interval langkah di sumbu Y
                    },
                },
            },
            plugins: {
                legend: {
                    display: true, // Menampilkan keterangan untuk setiap kategori
                },
                tooltip: {
                    enabled: true, // Menampilkan tooltip pada titik data
                },
            },
        },
    });

    // Rata Rata Umur Siswa
    var ctx4 = $("#bar-chart").get(0).getContext("2d");
    var myChart4 = new Chart(ctx4, {
        type: "bar",
        data: {
            labels: ["Kelas 10", "Kelas 11", "Kelas 12"], // Label yang tetap
            datasets: [
                {
                    label: "Kelas 10", // Keterangan dataset untuk Kelas 10
                    backgroundColor: "rgb(137, 121, 255)", // Warna untuk bar Kelas 10
                    data: [15, 0, 0], // Data untuk Kelas 10
                },
                {
                    label: "Kelas 11", // Keterangan dataset untuk Kelas 11
                    backgroundColor: "rgb(255, 146, 138)", // Warna untuk bar Kelas 11
                    data: [0, 16, 0], // Data untuk Kelas 11
                },
                {
                    label: "Kelas 12", // Keterangan dataset untuk Kelas 12
                    backgroundColor: "rgb(60, 195, 223)", // Warna untuk bar Kelas 12
                    data: [0, 0, 18], // Data untuk Kelas 12
                },
            ],
        },
        options: {
            responsive: true, // Membuat chart responsif
            scales: {
                x: {
                    stacked: true, // Membuat bar tumpuk jika ada lebih dari satu dataset
                    title: {
                        display: true, // Menampilkan judul sumbu X
                        text: "Kelas", // Nama untuk sumbu X
                    },
                },
                y: {
                    beginAtZero: true, // Memastikan sumbu Y mulai dari 0
                    title: {
                        display: true, // Menampilkan judul sumbu Y
                        text: "Jumlah Siswa", // Nama untuk sumbu Y
                    },
                    ticks: {
                        stepSize: 5, // Menentukan langkah interval pada sumbu Y
                    },
                },
            },
            plugins: {
                legend: {
                    position: "top", // Menempatkan legenda di atas chart
                    labels: {
                        usePointStyle: true, // Menggunakan gaya titik untuk label
                    },
                },
                tooltip: {
                    enabled: true, // Menampilkan tooltip saat hover
                    backgroundColor: "rgba(0,0,0,0.7)", // Warna latar belakang tooltip
                    titleColor: "#fff", // Warna teks judul tooltip
                    bodyColor: "#fff", // Warna teks isi tooltip
                },
            },
        },
    });

    // Pie Chart
    var ctx5 = $("#pie-chart").get(0).getContext("2d");
    var myChart5 = new Chart(ctx5, {
        type: "pie",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [
                {
                    backgroundColor: [
                        "rgba(235, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)",
                    ],
                    data: [55, 49, 44, 24, 15],
                },
            ],
        },
        options: {
            responsive: true,
        },
    });

    // Doughnut Chart
    var ctx6 = $("#doughnut-chart").get(0).getContext("2d");
    var myChart6 = new Chart(ctx6, {
        type: "doughnut",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [
                {
                    backgroundColor: [
                        "rgba(235, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)",
                    ],
                    data: [55, 49, 44, 24, 15],
                },
            ],
        },
        options: {
            responsive: true,
        },
    });
})(jQuery);
