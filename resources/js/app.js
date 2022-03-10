
$(function() {
    $('.menu-item').hover(function() {
        var index = $(this).index();
        $('.subnav').eq(index).removeClass('hidden').addClass('grid')
    }, function() { 
        var index = $(this).index();
        $('.subnav').eq(index).addClass('hidden').removeClass('grid');
    });
})

// $('.menu-item').mouseover(function() {
//     var index = $(this).index();
//     $('.subnav').eq(index).addClass('hidden').removeClass('grid');
// })

function showMenu() {
    $('.menu').removeClass('hidden');
}

function hideMenu() {
    $('.menu').addClass('hidden');
}

$('.btn-menu').click(function() {
    if($('.btn-menu').attr('show') == '1') {
        showMenu();
        $('.btn-menu').attr('show', '0');
    } else {
        hideMenu();
        $('.btn-menu').attr('show', '1');
    }
})