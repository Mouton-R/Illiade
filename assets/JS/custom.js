$("li.nav-item").on('click', function (e) {
    console.log(e.target, new Date().toString());
    $("li.nav-item.active").removeClass('active');
    $(this).addClass('active');

})