$(document).ready(function () {
    var table = $("#example").DataTable({
        lengthChange: true,
        buttons: ["copy", "excel", "pdf", "print"],
    });

    table.buttons().container().appendTo("#example_wrapper .col-md-6:eq(0)");

    $("#example_length").addClass("mb-2");
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$("#tambahData").click(function (e) {
    e.preventDefault();
    $("#modalBarang").modal("show");
});

$(".editData").click(function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        type: "GET",
        url: id + "/edit",
        success: function (response) {
            $(".editModalBarang").modal("show");
            $(".sku_up").val(response.result.sku);
            $(".nama_barang_up").val(response.result.nama_barang);
            $(".stock_bagus_up").val(response.result.stock_bagus);
            $(".stock_rusak_up").val(response.result.stock_rusak);
            $(".qty_keluar_up").val(response.result.qty_keluar);
            $(".harga_barang_up").val(response.result.harga_barang);
            $(".file_up").val(response.result.file);
            // console.log(response.result);
            simpan(id);
        },
    });
});

function simpan(id) {
    $("#updateData").click(function (e) {
        e.preventDefault();
        // alert("adasdasd");
        let sku = $("#sku_up").val();
        let nama_barang = $("#nama_barang_up").val();
        let stock_bagus = $("#stock_bagus_up").val();
        let stock_rusak = $("#stock_rusak_up").val();
        let qty_keluar = $("#qty_keluar_up").val();
        let harga_barang = $("#harga_barang_up").val();
        let file = $("#file_up").val();

        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });

        $.ajax({
            type: "PUT",
            url: "tambahData/" + id,
            data: {
                sku_up: sku,
                nama_barang_up: nama_barang,
                stock_bagus_up: stock_bagus,
                stock_rusak_up: stock_rusak,
                qty_keluar_up: qty_keluar,
                harga_barang_up: harga_barang,
                file_up: file,
            },
            dataType: "JSON",
            success: function (response) {
                if (response.success) {
                    Toast.fire({
                        icon: "success",
                        title: "Data Berhasil diinput",
                    });
                    $(".editModalBarang").modal("hide");
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                }
            },
        });
    });
}

function deleteData(id) {
    Swal.fire({
        title: "Yakin akan hapus id " + id + " ?",
        text: "Jika sudah pilih iya saya yakin",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya, Saya yakin!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: "delete/" + id,
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
                    }
                },
            });
        }
    });
}

$("#tambahKaryawan").click(function (e) {
    e.preventDefault();
    $.ajax({
        url: "user/tambahKaryawanModal",
        success: function (response) {
            $(".tambahKaryawan").html(response).show();
            $("#modalKaryawan").modal("show");
        },
    });
});

$(".editDataKaryawan").click(function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        type: "GET",
        url: id + "/editKaryawanModal",
        success: function (response) {
            $("#modalEditKaryawan").modal("show");
            $(".name").val(response.result.name);
            $(".email").val(response.result.email);
            $(".tlp").val(response.result.tlp);
            bcrypt.hashSync($(".password").val(response.result.password),10);
            $("select#wilayah").val(response.result.wilayah);
            $("select#level").val(response.result.level);
            $("select#status").val(response.result.status);
            $("#file").val(response.result.images);
            $("#is_active").val(response.result.is_active);

            // console.log(response.result);
            updateKaryawan(id);
        },
    });
});

function updateKaryawan(id) {
    $("#simpanDataKaryawan").click(function (e) {
        e.preventDefault();
        let name = $("#name").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let tlp = $("#tlp").val();
        let status = $("#status").val();
        let wilayah = $("#wilayah").val();
        let level = $("#level").val();
        let file = $("#file").val();
        let is_active = $("#is_active").val();

        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });

        if (name.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Nama tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (email.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Email tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (password.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Password tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (tlp.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Telepon tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (wilayah.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Wilayah tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (status.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Status diri tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (level.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "level tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (is_active.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Status karyawan tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else {
            $.ajax({
                type: "PUT",
                url: "updateKaryawan/" + id,
                data: {
                    name: name,
                    email: email,
                    password: password,
                    tlp: tlp,
                    is_active: is_active,
                    status: status,
                    wilayah: wilayah,
                    level: level,
                    file: file,
                },
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        Toast.fire({
                            icon: "success",
                            title: "Data Berhasil diinput",
                        });
                        setTimeout(function () {
                            window.location.reload();
                        }, 1510);
                    }
                },
            });
        }
    });
}

function deleteDataKaryawan(id) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: "Yakin akan hapus id " + id + " ?",
        text: "Jika sudah pilih iya saya yakin",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya, Saya yakin!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: "deleteKaryawan/" + id,
                success: function (response) {
                    if (response.success) {
                        Toast.fire({
                            icon: "success",
                            title: "Data Berhasil dihapus",
                        });
                        setTimeout(function () {
                            window.location.reload();
                        }, 1510);
                    }
                },
            });
        }
    });
}

$(".editDataMamber").click(function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    // alert(id)
    $.ajax({
        type: "GET",
        url: id + "/editMamberModal",
        success: function (response) {
            $("#modalEditMamber").modal("show");
            $(".name").val(response.result.name);
            $(".email").val(response.result.email);
            $(".tlp").val(response.result.tlp);
            $(".password").val(response.result.password);
            $("select#wilayah").val(response.result.wilayah);
            $("select#level").val(response.result.level);
            $("select#status").val(response.result.status);
            $("#file").val(response.result.images);
            $("#is_active").val(response.result.is_active);

            // console.log(response.result);
            udpateMamber(id);
        },
    });
});

function udpateMamber(id) {
    $("#simpanMamber").click(function (e) {
        e.preventDefault();
        let name = $("#name").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let tlp = $("#tlp").val();
        let status = $("#status").val();
        let wilayah = $("#wilayah").val();
        let file = $("#file").val();
        let is_active = $("#is_active").val();

        if (name.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Nama tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (email.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Email tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (password.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Password tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (tlp.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Telepon tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (wilayah.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Wilayah tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (status.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Status diri tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else if (is_active.length === 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Status karyawan tidak boleh kosong",
                showConfirmButton: false,
                timer: 1500,
            });
        } else {
            $.ajax({
                type: "PUT",
                url: "updateMamber/" + id,
                data: {
                    name: name,
                    email: email,
                    password: password,
                    tlp: tlp,
                    is_active: is_active,
                    status: status,
                    wilayah: wilayah,
                    file: file,
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
                    }
                },
            });
        }
    });
}

$("#tambahDataGalery").click(function (e) {
    e.preventDefault();
    $.ajax({
        url: "galery/modalTambah",
        success: function (response) {
            $(".tambahGalery").html(response).show();
            $("#modalKaryawan").modal("show");
        },
    });
});

function editGalery(id) {
    $.ajax({
        type: "GET",
        url: "galery/modalEdit",
        data: {
            id: id,
        },
        // dataType: "json",
        success: function (response) {
            $(".editGalery").html(response).show();
            $("#modalEditGalery").modal("show");
        },
    });
}

function deleteGalery(id) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: "Yakin akan hapus id " + id + " ?",
        text: "Jika sudah pilih iya saya yakin",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya, Saya yakin!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: "galery/delete/" + id,
                data: {
                    id: id,
                },
                
                success: function (response) {
                    if (response.success) {
                        Toast.fire({
                            icon: "success",
                            title: "Data Berhasil dihapus",
                        });setTimeout(function () {
                            location.reload();
                        }, 1510);
                    }
                },
            });
        }
    });
}
