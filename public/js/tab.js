$(document).ready(function(){

    $('.header-container__btn-tabs-category a:first').removeClass('item-opacity-low')
    $('.header--container__item-tab section').hide();
    $('.header--container__item-tab section:first').show();
    $('.header-container__btn-tabs-category > a').click(function(e){
        e.preventDefault(); 
        $('.header-container__btn-tabs-category a').addClass('item-opacity-low');
        this.classList.remove('item-opacity-low');
        $('.header--container__item-tab section').hide();
        let hrefOpen = $(this).attr('href');
        $(hrefOpen).show();
        
    });
    
})