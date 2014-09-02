/*-----------------------------------------------------------------------
*	Main Layout Function Scirpt for WordPress Theme EHP2
*	Project Name:		EHP2
*	Created:			Gary Sun	2014-07-09
*	Last Edited:		Gary Sun	2014-08-29
-----------------------------------------------------------------------*/

(function($, window, document) {
    var isCodeSnippetInit = false;
    var videoPosition = 1;
    var isVideoScrolling = false;
    
    initLayout = function (){
        var $frame = document.getElementById('ehp-frame');
        
        if ($frame.clientWidth < 1000){
            $('#ehp-sitetitle').css('height', '170px');
            $('#ehp-headersearchframe').css({
                'width': '100%',
                'margin-top': '30px'
            });
            $('#ehp-bodycontent').css('width', '100%');
            $('.ehp-bodyleftframe').css('width', '100%');
            $('#ehp-sidebar').css({
                'width': '100%'
            });
            $('#ehp-highlightextnews').css({
                'width': '100%'
            });           
            $('#ehp-sidebar .ehp-widget').css('border-bottom', '1px solid #eeeef5');
            $('.ehp-footer-subarea').css({
                'width': '100%',
                'min-height': '10px',
                'border-width': '0 0 1px 0',
                'margin': '25px 0 0 0',
                'padding': '0 30px 25px 30px'
            });
            if ($frame.clientWidth < 1000){
               $('.ehp-footer-subarea').css({
                    'margin': '10px 0 0 0',
                    'padding': '0 5px 15px 5px'
                }); 
            }
            $('#ehp-topAD').hide();
        }
        else {
            $('#ehp-sitetitle').css('height', '85px');
            $('#ehp-headersearchframe').css({
                'width': '30%',
                'margin-top': '51px'
            });
            $('#ehp-bodycontent').css('width', ($frame.clientWidth - 330 - 70).toString() + 'px');
            $('.ehp-bodyleftframe').css('width', ($frame.clientWidth - 330 - 70).toString() + 'px');
            $('#ehp-sidebar').css({
                'width': '310px'
            });
            $('#ehp-highlightextnews').css({
                'width': '310px'
            });
            $('#ehp-sidebar .ehp-widget').css('border-bottom', '0');
            $('.ehp-footer-subarea').css({
                'width': '25%',
                'min-height': '220px',
                'border-width': '0 1px 0 0',
                'margin': '25px 0',
                'padding': '0 30px 0 30px'
            });
            $('#ehp-topAD').show();
        }
        
        if ($frame.clientWidth < 1200){
            $('#ehp-linkhub').css('width', '100%');
            $('#ehp-banner-widget').css('width', '100%');
            $('#ehp-topannounce-area').css('width', '100%');
             $('.ehp-videopanel-left').css({
                'width': '100%'
            });
            $('.ehp-videopanel-right').css({
                'padding-left': '0',
                'margin-top': '20px',
                'width': '100%'
            });
        }
        else {
            $('.ehp-videopanel-left').css({
                'width': '29%'
            });
            $('.ehp-videopanel-right').css({
                'padding-left': '25px',
                'margin-top': '0',
                'width': '71%'
            });
            $('#ehp-linkhub').css('width', '73%');
            $('#ehp-banner-widget').css('width', '27%');
            $('#ehp-topannounce-area').css('width', '305px');
        }
    }
    
    showLinkArea = function(id){
        if ( !($('#ehp-linkhub-tab' + id.toString()).hasClass('ehp-linkhub-tab-active')) ){
            $('.ehp-linkhub-tab-active').removeClass('ehp-linkhub-tab-active');
            $('.ehp-linkhub-area-active').fadeOut(10, function(){
                $('.ehp-linkhub-area-active').removeClass('ehp-linkhub-area-active');
                $('#ehp-linkhub-tab' + id.toString()).addClass('ehp-linkhub-tab-active');
                $('#ehp-linkhub-area' +id.toString()).slideDown(200);
                $('#ehp-linkhub-area' +id.toString()).addClass('ehp-linkhub-area-active');
            })
            
        }
    }
    
    showIndex = function(id){
        $('#ehp-layeredIndex > h1').addClass('ehp-inactiveIndex');       
        $('.ehp-indexpanel-active').slideUp(200, function(){
            $('#ehp-indexpanel' + id).addClass('ehp-indexpanel-active');
            $('#ehp-index' + id).removeClass('ehp-inactiveIndex');
        });
        $('#ehp-indexpanel' + id).slideDown(200);
        $('.ehp-indexpanel-active').removeClass('ehp-indexpanel-active');
    }
    
    initCodeSnippet = function(){
        if (isCodeSnippetInit)
            return;
        
        if ( $('#qt_comment_toolbar').html()){
            $('#qt_comment_crayon_quicktag').val('Code Snippet');
            isCodeSnippetInit = true;
        }
        if ( $('#qt_user_post_desc_toolbar').html()){
            $('#qt_user_post_desc_crayon_quicktag').val('Code Snippet');
            isCodeSnippetInit = true;
        }
        
        setTimeout('initCodeSnippet()', 1000);
    }
    
    scrollVideo = function(updown){
        if (isVideoScrolling)
            return;
        isVideoScrolling = true;
        if (updown == 'up'){
            videoPosition = videoPosition - 2;
            if (videoPosition < 0)
                videoPosition = 0;
            $('#ehp-topvideopanel').animate(
                {marginLeft: -210 * videoPosition + 'px', },
                400,
                function(){
                    isVideoScrolling = false;
                    if (videoPosition <= 0){
                        videoPosition = 1;
                        $('#ehp-topvideo-pre').addClass('ehp-topvideo-inactivenav');
                    }
                    else videoPosition++;  
                    $('#ehp-topvideo-next').removeClass('ehp-topvideo-inactivenav');
                }
            );
        }
        if (updown == 'down'){
            if (videoPosition >= 5){
                isVideoScrolling = false;
                return;
            }
            $('#ehp-topvideopanel').animate(
                {marginLeft: -210 * videoPosition + 'px', },
                400,
                function(){
                    isVideoScrolling = false;
                    videoPosition++;
                    $('#ehp-topvideo-pre').removeClass('ehp-topvideo-inactivenav');
                    if (videoPosition >= 5){
                        $('#ehp-topvideo-next').addClass('ehp-topvideo-inactivenav');
                    }
                }
            ); 
        }       
    }
    
    checkBlogField = function(){
        //alert('a' + $('#frontier_categorymulti').val());
        if ( $('#user_post_title').val() != '' && $('#frontier_categorymulti').val() ){
            $('#ehp-savenotice').hide();
            $('#user_post_save').removeClass('ehp-button-disabled');
            $('#user_post_preview').removeClass('ehp-button-disabled');
            $('#user_post_save').removeAttr('disabled');
            $('#user_post_preview').removeAttr('disabled');
        }
        else {
            $('#ehp-savenotice').show();
            $('#user_post_save').addClass('ehp-button-disabled');
            $('#user_post_preview').addClass('ehp-button-disabled');
            $('#user_post_save').attr('disabled', 'disabled');
            $('#user_post_preview').attr('disabled', 'disabled');       
        }
    }
    
    window.onresize = function(){
		setTimeout('initLayout()', 200);
		return;
	};    
    initLayout();
    
    
    // Init Header: Main Menu
    $('#ehp-mainmenu > div > ul').slimmenu({
        resizeWidth: '1110',
        collapserTitle: '',
        animSpeed: 'fast',
        easingEffect: null,
        indentChildren: true,
        childrenIndenter: '&nbsp;&nbsp;&nbsp;&nbsp;'
    });
    
    // Init Body: Top Videos
    /*
    for (var i = 0; i < topVideoArray.length; i++){
        var videopanel = '.ehp-videopanel-left';
        if (i > 1)
            videopanel = '.ehp-videopanel-right';
        $(videopanel).append('<div class="ehp-video"><iframe frameborder="0" seamless="seamless" src="' + topVideoArray[i].link + '"></iframe><h5 class="ehp-2ndColor">' + topVideoArray[i].title + '<p class="ehp-3rdColor">' + topVideoArray[i].date + ' by ' + topVideoArray[i].author + '</p></h5></div>');
    }
    */
    
    // Init Body: LayeredIndex
    $('#ehp-indexpanel2').slideDown(200, function(){
        $('#ehp-indexpanel2').addClass('ehp-indexpanel-active');
    });
    $('#ehp-blog-buttons').prev().css('border-bottom', '0');
    
    // Init Sidebar
    $('#ehp-sidebar .ehp-widget-title').each(function(){
        //$(this).html('<span class="icon-667"></span>' + $(this).html());
    });
    
    $('.widget_rss h1').each(function(){
        $(this).find('a').first().html('<span class="icon-819 ehp-icon"></span>');
        //$(this).find('a').first().css('margin-right', '10px');
    });
    
    $('#ehp-sidebar .ehp-widget-title').each(function(){
        $this = $(this);
        var title = $this.html();
        if (title.charAt(0) == '#'){
            title = title.substring(1);
            var titlearray = title.split('#');
            $this.html('<span class="icon-' + titlearray[0] + '"></span>' + titlearray[1]);
        }
    });
    $('#ehp-bodywidget .ehp-widget-title').each(function(){
        $this = $(this);
        var title = $this.html();
        if (title.charAt(0) == '#'){
            title = title.substring(1);
            var titlearray = title.split('#');
            $this.html('<span class="icon-' + titlearray[0] + '"></span>' + titlearray[1]);
        }
    });
    $('#ehp-footerwidget .ehp-widget-title').each(function(){
        $this = $(this);
        var title = $this.html();
        if (title.charAt(0) == '#'){
            title = title.substring(1);
            var titlearray = title.split('#');
            $this.html('<span class="icon-' + titlearray[0] + '"></span>' + titlearray[1]);
        }
    });
    
    $('#ehp-sidebar .frontier-my-post-widget').find('center').first().find('a').html('Write A Blog');
    $('#ehp-sidebar .frontier-my-post-widget').find('center').first().show();
    $('#ehp-sidebar .frontier-my-post-widget').find('ul').first().append('<li><a id="ehp-allmybloglink" href="/my-posts/">View All My Blogs...</a></li>');
    
    
    // Init Frontier Post Page
    $('.frontier_post_form textarea#user_post_excerpt').parent().hide();
    
    $('#frontier_categorymulti').find('option').first().hide();
    $('#frontier_categorymulti').find('option').first().next().attr('selected','selected');
    
    // init Code Snippet
    initCodeSnippet();
    
    var c = '';
    for (var i = 0; i < 900; i++){
        var b = i.toString(16);
        if (i < 16)
            b = '00' + b;
        else if (i < 256)
            b = '0' + b;
        //c+= 'span.icon-' + i.toString() + ':after{font-family:icons;content:\'\\e' + b + '\';}';
        c+= '<span class="icon-' + i.toString() + '" style="font-size: 30px; padding: 5px;">' + '</span>';
    }
    //$('#iconlist').html(c);
    
    // Init Comments
    $('ul.ehp-comment-list .comment-reply-link').html('<span class="icon-222"></span>&nbsp;&nbsp;Reply ');
    
    checkBlogField();
    
})(jQuery, window, document);