// ハンバーガーボタン　ドロアー

jQuery("#js-button-drawer").on("click",function(){
    jQuery(this).toggleClass("is-checked");
    jQuery("#js-drawer").slideToggle();
    jQuery("body").toggleClass("is-fixed");
});