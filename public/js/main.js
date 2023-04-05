$(document).ready(function () {
    // http clinet API
    const httpClient = "http://127.0.0.1:8000";
    // Fungsi untuk memanggil API
    function fetchData() {
        $.ajax({
            url: httpClient + "/api/post",
            method: "GET",
            dataType: "json",
            success: function (response) {
                // Tangkap elemen HTML tempat menampilkan data
                var resultElement = $("#result");

                // Bersihkan elemen HTML sebelum menambahkan data baru
                resultElement.empty();

                // Tampilkan data ke dalam elemen HTML
                $.each(response.data, function (i, item) {
                    var newElement =
                        $(`<li class="flex w-full justify-between hover:bg-gray-700 rounded-lg text-gray-300 cursor-pointer items-center">
                                            <a href="/${item.id}"  class="px-2 py-3 flex w-full items-center focus:outline-none focus:ring-2 focus:ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                                </svg>                                     
                                                <span class="text-lg ml-2 truncate">${item.title}</span>
                                            </a>
                                        </li>`);

                    resultElement.append(newElement);
                });
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            },
        });
    }
    fetchData();

    $("#form-input").submit(function (event) {
        var title = $("#title").val();
        var body = $("#body").val();
        const formData = {
            title: title,
            body: body,
        };

        $.ajax({
            url: httpClient + "/api/post",
            type: "POST",
            dataType: "json",
            data: formData,
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.log("Terjadi kesalahan: " + error);
            },
        });

        event.preventDefault();
        // return false;
    });

    var postId = "";
    function fetchShowId() {
        postId = $("#idFormPost").val();
        if (postId) {
            $.ajax({
                url: `${httpClient}/api/post/${postId}`,
                method: "GET",
                dataType: "json",
                success: function (response) {
                    // Tangkap elemen HTML tempat menampilkan data
                    var resultElement = $("#content");

                    // Bersihkan elemen HTML sebelum menambahkan data baru
                    resultElement.empty();

                    var newElement = $(`<p>${response.data.body}</p>`);

                    resultElement.append(newElement);

                    $("#title").val(response.data.title);
                    $("#body").val(response.data.body);
                    postId = response.data.id;
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                },
            });
        }
    }
    fetchShowId();

    $("#form-update").submit(function (event) {
        const formData = {
            title: $("#title").val(),
            body: $("#body").val(),
        };
        $.ajax({
            url: `${httpClient}/api/post/${postId}`,
            type: "PUT",
            dataType: "json",
            data: formData,
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.log("Terjadi kesalahan: " + error);
            },
        });
        event.preventDefault();
    });

    var alertDelete = false;
    function alertsDel() {
        alertDelete = !alertDelete;
        if (alertDelete) {
            $("#alertDelete").removeClass("hidden");
        } else {
            $("#alertDelete").addClass("hidden");
        }
    }
    $(".btnAlert").on("click", function () {
        alertsDel();
    });
    $("#btnDelete").on("click", function () {
        $.ajax({
            url: `${httpClient}/api/post/${postId}`,
            type: "DELETE",
            success: function (response) {
                location.reload();
            },
            error: function (xhr, status, error) {
                console.log("Terjadi kesalahan: " + error);
            },
        });
    });
    $("#refresh-btn").on("click", function () {
        location.reload();
    });
});
