$(document).ready(function () {
    $("#sidebarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
        $(this).toggleClass("active");
    });

    $("#dataTable").DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50, 75, 100],
    });

    // edit user
    $(document).on("click", ".modalEditUser", function () {
        var url = "user/";
        var id = $(this).val();
        $.get(url + id, function (items) {
            $("#editId").val(items.id);
            $("#editName").val(items.name);
            $("#editEmail").val(items.email);
            $("#editContact").val(items.contact);
            $("#editAddress").val(items.address);
            $("#editUser").modal("show");
        });
    });
    // end edit user

     // edit banner
     $(document).on("click", ".modalEditBanner", function () {
        var url = "banner/";
        var id = $(this).val();
        $.get(url + id, function (items) {
            $("#editId").val(items.id);
            $("#editName").val(items.name);
            $("#editImage").attr('src','images/banner/'+items.image);
            $("#editBanner").modal("show");
        });
    });
    // end edit banner

    // edit media
    $(document).on("click", ".modalEditMedia", function () {
        var url = "media/";
        var id = $(this).val();
        $.get(url + id, function (items) {
            $("#editId").val(items.id);
            $("#editName").val(items.name);
            $("#editUrl").val(items.url);
            $("#editMedia").modal("show");
        });
    });
    // end edit media
});
