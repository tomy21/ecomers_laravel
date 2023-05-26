$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="crsf-token"]').attr("content"),
    },
});

var swiper = new Swiper(".swiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swipper = new Swiper(".swipperPromosi", {
    slidesPerView: 4,
    spaceBetween: 30,
    freeMode: true,
});

$(".text-links").click(function (e) {
    e.preventDefault();
    var $linksLogin = $("#links-login");
    if ($linksLogin.hasClass("activeLogin")) {
        $linksLogin.removeClass("activeLogin");
    } else {
        $linksLogin.addClass("activeLogin");
    }
});

function login() {
    $("#blur").addClass("activeBlur");
    $("#modalLogin").addClass("active");
}

function closeLogin() {
    $("#blur").removeClass("activeBlur");
    $("#modalLogin").removeClass("active");
}

function daftar() {
    $("#blur").addClass("activeBlur");
    $("#modalLogin").removeClass("active");
    $("#modaldaftar").addClass("active");
}

function closeRegis() {
    $("#blur").removeClass("activeBlur");
    $("#modaldaftar").removeClass("active");
}

function backToLogin() {
    $("#blur").addClass("activeBlur");
    $("#modalLogin").addClass("active");
    $("#modaldaftar").removeClass("active");
}

function loginBtn() {
    login();
}

$("#button-toggle").click(function (e) {
    e.preventDefault();
    var $linksLogin = $("#sidebar");
    var $mainContent = $("#main-content");
    if (
        $linksLogin.hasClass("active-sidebar") &&
        $mainContent.hasClass("active-main-content")
    ) {
        $linksLogin.removeClass("active-sidebar");
        $mainContent.removeClass("active-main-content");
        $mainContent.addClass("sidebarM");
    } else {
        $linksLogin.addClass("active-sidebar");
        $mainContent.addClass("active-main-content");
        $mainContent.removeClass("sidebarM");
    }
});

function addData() {
    let name = $("#name").val();
    let email = $("#email_daftar").val();
    let password = $("#password").val();
    let tlp = $("#tlp").val();
    let tgl_lahir = $("#tgl_lahir").val();
    let jeniskelamin = $("#jeniskelamin").val();
    let status = $("#status").val();
    let wilayah = $("#wilayah").val();
    let ceklist = $("#ceklist").val();

    if (name.length === 0) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "nama tidak boleh kosong",
            showConfirmButton: false,
            timer: 1500,
        });
    } else if (email.length === 0) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "email tidak boleh kosong",
            showConfirmButton: false,
            timer: 1500,
        });
    } else if (tlp.length === 0) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "no tlp tidak boleh kosong",
            showConfirmButton: false,
            timer: 1500,
        });
    } else if (tgl_lahir.length === 0) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "date tidak boleh kosong",
            showConfirmButton: false,
            timer: 1500,
        });
    } else if (status.length === 0) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "status tidak boleh kosong",
            showConfirmButton: false,
            timer: 1500,
        });
    } else if (wilayah.length === 0) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "wilayah tidak boleh kosong",
            showConfirmButton: false,
            timer: 1500,
        });
    } else if (password.length === 0) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "password tidak boleh kosong",
            showConfirmButton: false,
            timer: 1500,
        });
    }
    if (!$("#ceklist").is(":checked")) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Ketentuan harus di ceklist",
            showConfirmButton: false,
            timer: 1500,
        });
    } else {
        Swal.fire({
            title: "Sudah yakin ?",
            text: "Jika sudah pilih iya saya yakin",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Iya, Saya yakin!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "get",
                    url: "store",
                    data: {
                        name: name,
                        email: email,
                        password: password,
                        tlp: tlp,
                        tgl_lahir: tgl_lahir,
                        jeniskelamin: jeniskelamin,
                        status: status,
                        wilayah: wilayah,
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.success,
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function () {
                                window.location.reload();
                            }, 1510);
                            closeRegis();
                        }
                        if (response.error) {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: response.error,
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                });
            }
        });
    }
}
