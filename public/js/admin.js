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

    $("#simpanBarang").click(function () {
        let sku = $("#sku").val();
        let nama_barang = $("#nama_barang").val();
        let stock_bagus = $("#stock_bagus").val();
        let stock_rusak = $("#stock_rusak").val();
        let qty_keluar = $("#qty_keluar").val();
        let harga_barang = $("#harga_barang").val();
        var images = $("#file").val();
        // var images = file.files[0];
        
        console.log(images);
        $.ajax({
            type: "post",
            url: "tambahData",
            data: {
                sku: sku,
                nama_barang: nama_barang,
                stock_bagus: stock_bagus,
                stock_rusak: stock_rusak,
                qty_keluar: qty_keluar,
                harga_barang: harga_barang,
                images: images,
            },
            success: function (response) {
                console.log(response);
                if (response.errors) {
                    $(".alert-danger").removeClass("d-none");
                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });
                } else {
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
    });
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
            $(".password").val(response.result.password);
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

function updateKaryawan(id){
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

$("#formTambahKaryawan").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: $(this).attr("action"),
        data: $(this).serialize(),
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
});

// function simpanKaryawan() {
    
//     let name = $("#name").val();
//     let email = $("#email").val();
//     let password = $("#password").val();
//     let tlp = $("#tlp").val();
//     let jenisKelamin = $("#jenisKelamin").val();
//     let tgl_lahir = $("#tgl_lahir").val();
//     let status = $("#status").val();
//     let wilayah = $("#wilayah").val();
//     let level = $("#level").val();
//     let file = $("#file").val();

//     if (name.length === 0) {
//         Swal.fire({
//             position: "center",
//             icon: "error",
//             title: "Nama tidak boleh kosong",
//             showConfirmButton: false,
//             timer: 1500,
//         });
//     } else if (email.length === 0) {
//         Swal.fire({
//             position: "center",
//             icon: "error",
//             title: "Email tidak boleh kosong",
//             showConfirmButton: false,
//             timer: 1500,
//         });
//     } else if (password.length === 0) {
//         Swal.fire({
//             position: "center",
//             icon: "error",
//             title: "Password tidak boleh kosong",
//             showConfirmButton: false,
//             timer: 1500,
//         });
//     } else if (tlp.length === 0) {
//         Swal.fire({
//             position: "center",
//             icon: "error",
//             title: "Telepon tidak boleh kosong",
//             showConfirmButton: false,
//             timer: 1500,
//         });
//     } else if (wilayah.length === 0) {
//         Swal.fire({
//             position: "center",
//             icon: "error",
//             title: "Wilayah tidak boleh kosong",
//             showConfirmButton: false,
//             timer: 1500,
//         });
//     } else if (tgl_lahir.length === 0) {
//         Swal.fire({
//             position: "center",
//             icon: "error",
//             title: "Tanggal lahir tidak boleh kosong",
//             showConfirmButton: false,
//             timer: 1500,
//         });
//     } else if (level.length === 0) {
//         Swal.fire({
//             position: "center",
//             icon: "error",
//             title: "level tidak boleh kosong",
//             showConfirmButton: false,
//             timer: 1500,
//         });
//     } else {
//         $.ajax({
//             type: "POST",
//             url: $(this).attr('action'),
//             // data: {
//             //     name: name,
//             //     email: email,
//             //     password: password,
//             //     tlp: tlp,
//             //     jenisKelamin: jenisKelamin,
//             //     tgl_lahir: tgl_lahir,
//             //     status: status,
//             //     wilayah: wilayah,
//             //     level: level,
//             //     file: file,
//             // },
//             data: $(this).serialize(),
//             dataType: "json",
//             success: function (response) {
//                 if (response.success) {
//                     Swal.fire({
//                         position: "center",
//                         icon: "success",
//                         title: response.success,
//                         showConfirmButton: false,
//                         timer: 1500,
//                     });
//                     setTimeout(function () {
//                         window.location.reload();
//                     }, 1510);
//                 }
//             },
//         });
//     }
// }

function deleteDataKaryawan(id) {
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