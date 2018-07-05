$(document).ready(function () {

    $("#msgid").html("This is Hello World by JQuery");

    $("#btnload").click(function () {
        $("#divload").load("a.txt", function (responseTxt, statusTxt, xhr) {
            alert(statusTxt);
        });
    });

    $("#btnget").click(function () {
        $.get("get.php", function (data) {
            $("#divget").html(data);
        });
    });

    $("#btnpost").click(function () {
        $.post("post.php", { 'name': 'Ram', 'age': 20 }, function (data) {
            $("#divpost").html(data);
        });
    });

    $("#btnajax").click(function () {
        $.ajax({
            type: 'post',
            data: { 'name': 'Shyam', 'age': 22 },
            url: 'ajax.php',
            success: function (data) {
                $("#divajax").html(data);
            }
        });
    });
});