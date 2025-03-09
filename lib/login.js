$(document).ready(function() {
    $(".user").on("click", function() {
        $(".fuser").removeClass("d-none"); // Show User Form
        $(".fadmin").addClass("d-none"); // Hide Admin Form
    });

    $(".admin").on("click", function() {
        $(".fadmin").removeClass("d-none"); // Show Admin Form
        $(".fuser").addClass("d-none"); // Hide User Form
    });
});