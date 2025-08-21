$(document).ready(function () {
    // $("select").addClass("selectpicker");
    // $("select").selectpicker();


    // $("select").attr("data-live-search", "true");
    // $("select").attr("data-container", "body");
    // $("select[multiple]").attr("data-actions-box", "true");
   

    // Get the current URL and split it by '/'
    var currentUrl = window.location.href;
    var segments = currentUrl.split("/");

    // Extract the first segment after the domain
    var firstSegment = segments[3];

    // console.log('firstSegment'+firstSegment);

    // Get the current URL and split it by '/'
    var currentUrl = window.location.href;
    var segments = currentUrl.split("/");

    // Extract the first segment after the domain
    var firstSegment = segments[3];

    // Iterate through each sidebar menu item
    $(".nav-sidebar li.nav-item").each(function () {
        var menuItem = $(this);
        var menuItemHref = menuItem.find("a").attr("href");
        if (menuItemHref !== undefined) {
            var menuItemSegments = menuItemHref.split("/");

            // console.log('menuItemSegments[3]'+menuItemSegments[3]);
            // Check if the first segment of the menu item's href matches the current URL's first segment

            if (
                menuItemSegments.length > 3 &&
                menuItemSegments[3] === firstSegment
            ) {
                $(".nav-link").removeClass("active");
                // Add 'active' class to the matching nav-link
                // console.log(menuItem,menuItemHref);
                // console.log(menuItem.find('.nav-link'));
                menuItem.find(".nav-link").addClass("active");

                // Expand the parent menu if it's a submenu
                menuItem.parents(".nav-treeview").css("display", "block");
                menuItem
                    .parents(".nav-item")
                    .addClass("menu-is-opening menu-open");
                // $('.menu-open .nav-link').addClass('active');.
                $(".menu-open > .nav-link").addClass("active");
            }
        }
    });

    $(
        ".table_form th, .card-title , body .modal-title,  #result th, .nav-link p , .modal label"
    ).each(function () {
        let wordsToExclude = ["at", "of", "in"]; // Add other words here as needed
        let text = $(this).text();
        let words = text.split(" ");

        let updatedWords = words.map(function (word) {
            return wordsToExclude.includes(word.toLowerCase())
                ? word.toLowerCase()
                : word.charAt(0).toUpperCase() + word.slice(1);
        });

        $(this).text(updatedWords.join(" "));
    });
    document.addEventListener("DOMContentLoaded", function () {
        const formControls = document.querySelectorAll(
            ".form-control, .form-select"
        );

        formControls.forEach((control) => {
            control.addEventListener("input", function () {
                if (control.value.trim() === "") {
                    control.classList.remove("valid");
                }
            });
        });
    });
});
