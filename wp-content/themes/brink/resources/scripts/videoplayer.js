


// Youtube Video Players
var ytPlayerInfoList = new Array();

if ( jQuery('.youtube-player').length > 0 ){

    // Link Up Youtube Scripts
    var yttag = document.createElement('script');
    yttag.src = "https://www.youtube.com/iframe_api";
    var ytFirstScriptTag = document.getElementsByTagName('script')[0];
    ytFirstScriptTag.parentNode.insertBefore(yttag, ytFirstScriptTag);

    jQuery('.youtube-player').each( function(){
        var ytPlayerData = { id: jQuery(this).attr('id'), videoId: jQuery(this).data('video'), options: jQuery(this).data('options') };
        ytPlayerInfoList.push( ytPlayerData );
    });
}

function onYouTubeIframeAPIReady() {
    if(typeof ytPlayerInfoList === 'undefined')
        return; 

    for(var i = 0; i < ytPlayerInfoList.length;i++) {
        var curplayer = createYTPlayer(ytPlayerInfoList[i]);
    }   
}
function createYTPlayer(ytPlayerInfo) {
    return new YT.Player(ytPlayerInfo.id, {
        height: '390',
        width: '640',
        videoId: ytPlayerInfo.videoId,
        enablejsapi: 1,
        playerVars: {
            autoplay: ytPlayerInfo.options.includes('autoplay') ? 1 : 0,
            loop: ytPlayerInfo.options.includes('loop') ? 1 : 0,
            playlist: ytPlayerInfo.options.includes('loop') ? ytPlayerInfo.videoId : '',
            mute: ytPlayerInfo.options.includes('muted') ? 1 : 0,
            playsinline: ytPlayerInfo.options.includes('playsinline') ? 1 : 0,
            controls: ytPlayerInfo.options.includes('no-controls') ? 0 : 1,
            rel: 0,
            modestbranding: 1,
        }        
    });
}


// Vimeo Video Players
var vimPlayerInfoList = new Array();

var createVIMPlayer = function(vimPlayerInfo) {
    return new Vimeo.Player(vimPlayerInfo.id, {
        id: vimPlayerInfo.videoId,
        width: 640,
        loop: vimPlayerInfo.options.includes('loop') ? true : false,
        autoplay: vimPlayerInfo.options.includes('autoplay') ? true : false,
        muted: vimPlayerInfo.options.includes('muted') ? true : false,
        playsinline: vimPlayerInfo.options.includes('playsinline') ? true : false,
        background: vimPlayerInfo.options.includes('no-controls') ? true : false,
        byline: vimPlayerInfo.options.includes('no-controls') ? false : true,
        portrait: vimPlayerInfo.options.includes('no-controls') ? false : true,
        title: vimPlayerInfo.options.includes('no-controls') ? false : true,
    });
};

if ( jQuery('.vimeo-player').length > 0 ){

    var vimTag = document.createElement('script');
    vimTag.src = "https://player.vimeo.com/api/player.js";
    var vimFirstScriptTag = document.getElementsByTagName('script')[0];
    vimFirstScriptTag.parentNode.insertBefore(vimTag, vimFirstScriptTag);

    jQuery(document).ready(function(){

        jQuery('.vimeo-player').each( function(){
            var vimPlayerData = { id: jQuery(this).attr('id'), videoId: jQuery(this).data('video'), options: jQuery(this).data('options') };
            vimPlayerInfoList.push( vimPlayerData );
        });

        setTimeout(function(){
            for (var i = 0; i < vimPlayerInfoList.length; i++) {
                createVIMPlayer(vimPlayerInfoList[i]);
            }
        }, 1000);
    });
}
