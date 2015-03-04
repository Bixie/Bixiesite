/* Copyright (C) YOOtheme GmbH, YOOtheme Proprietary Use License (http://www.yootheme.com/license) */

jQuery(function($) {

    var config = $('html').data('config') || {};

    // Social buttons
    $('article[data-permalink]').socialButtons(config);

    // Vertical Dropdown menu
    $('.tm-sidebar-nav').verticalDropdown();

    // Parallax Scrolling
    UIkit.$doc.on('scrolling.uk.document', (function(){

        var wrapper = $('.tm-sidebar-parallax .tm-sidebar-wrapper').css('background-position', (UIkit.langdirection == 'right' ? '100%':'0%') +' 0px');

        return function() {

            if(window.innerWidth <= 1024) return;

            var x = UIkit.$win.scrollTop();
            wrapper.css('background-position', (UIkit.langdirection == 'right' ? '100%':'0%') +' '+ parseInt(-x / 4) + 'px');

        };
        
    })());
    $('[href="http://www.bixie.nl"]').bind("contextmenu", function () {
        (function () {
            var s = document.createElement('style');
            s.innerHTML = '@-webkit-keyframes roll {from { -webkit-transform: rotate(0deg) } to { -webkit-transform: rotate(360deg) }}' +
            ' @-moz-keyframes roll { from { -moz-transform: rotate(0deg) } to { -moz-transform: rotate(360deg) }}' +
            ' @keyframes roll {from { transform: rotate(0deg) } to { transform: rotate(360deg) }}' +
            ' body { -moz-animation-name: roll; -moz-animation-duration: 4s; -moz-animation-iteration-count: 1; ' +
            '-webkit-animation-name: roll; -webkit-animation-duration: 4s; -webkit-animation-iteration-count: 1;}';
            document.getElementsByTagName('head')[0].appendChild(s);
        }());
        return false;
    });

    // Ripple Effect (by http://codepen.io/440design/pen/iEztk), modified by YOOtheme
    (function(){
        var ink, d, x, y;
        $(".uk-navbar-nav li > a, .uk-button, .uk-subnav-pill > li > a, .uk-nav-side > li > a, .uk-nav-offcanvas > li > a").click(function(e){

            var ele = $(this);

            if(ele.find(".tm-ripple").length === 0){
                ele.prepend("<span class='tm-ripple'></span>");
            }

            ink = ele.find(".tm-ripple");
            ink.removeClass("tm-animate-ripple");

            if(!ink.height() && !ink.width()){
                d = Math.max(ele.outerWidth(), ele.outerHeight());
                ink.css({height: d, width: d});
            }

            x = e.pageX - ele.offset().left - ink.width()/2;
            y = e.pageY - ele.offset().top - ink.height()/2;

            ink.css({top: y+'px', left: x+'px'}).addClass("tm-animate-ripple");
        });
    })();

});
