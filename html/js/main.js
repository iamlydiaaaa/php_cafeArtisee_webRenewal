$(function () {
    $('#gnb').on('mouseenter', function () {
        $('#gnb>ul ul').stop().show()
        $('#gnb>p').stop().show()
        $('.gnb-bg').stop().show()
    })
    $('#gnb').on('mouseleave', function () {
        $('#gnb>ul ul').stop().hide()
        $('#gnb>p').stop().hide()
        $('.gnb-bg').stop().hide()
    })
    
    $('#gnb>ul ul').on('mouseenter', function(){
        $(this).siblings('a').stop().css({
            'color':'#86d1c6',
            'transition': 'all 0.2s'
        })
    })
    $('#gnb>ul ul').on('mouseleave', function(){
        $(this).siblings('a').stop().css({
            'color':'#433737'
        })
    })
})
