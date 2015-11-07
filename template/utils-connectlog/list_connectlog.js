$(document).ready(function () {
    function loadTable()
    {
        //$("#div-table").empty();
        $("#div-table").html("<div id='div-loader'><img src='http://ezpz.cz/ext/phpbb/pages/styles/pbtech/theme/gears.gif' alt='Loading...' style='display: block; margin-left: auto; margin-right: auto;' /></div>");

        /*$("#div-table").slideUp("slow", function() {
         $("#div-table").empty();
         $("#div-loader").slideDown();
         });*/

        $("#div-table").load("http://ezpz.cz/ext/phpbb/pages/styles/pbtech/template/utils-connectlog/list_connectlog.php?serverid=" +
                              encodeURIComponent($("#select-server").find(":selected").attr("serverid")) +
                              "&lang=" + encodeURIComponent($(".lang").attr("value")) +
                              "&nickname=" + encodeURIComponent($("#input-nickname").val()) +
                              "&steamid=" + encodeURIComponent($("#input-steamid").val()) +
                              "&ip=" + encodeURIComponent($("#input-ip").val()),
                              function() {
            $('#table-connectlog').DataTable({
                "order": [[ 0, 'desc' ]]
            });

          //$("#div-loader").slideUp();
          //$("#div-table").slideDown("slow");
        });
    }

    $("#button-search").click(function(e)
    {
        loadTable();
        //loadTable();

        e.preventDefault();
    });
    
    var args = getJsonFromUrl();
    
    var nickname = args["nickname"];
    var steamid = args["steamid"];
    var ip = args["ip"];
        
    if (typeof nickname !== 'undefined')
    {
        $("#input-nickname").val(nickname);
        
    }
    
    if (typeof steamid !== 'undefined')
    {
        $("#input-steamid").val(steamid);
    }
    
    if (typeof ip !== 'undefined')
    {
        $("#input-ip").val(ip);
    }
    
    if (typeof nickname !== 'undefined' | typeof steamid !== 'undefined' | typeof ip !== 'undefined')
    {
        loadTable();
        //loadTable();
    }
    
    $("#div-table").on("click", ".ban", function(e)
    {
        $(".ban").fancybox(
        {
            "overlayColor": "#000",  // here you set the background black
            "overlayOpacity": 1,  // here you set the transparency of background: 1 = opaque
            "hideOnOverlayClick": true,  // if true, closes fancybox when clicking OUTSIDE the box
            "hideOnContentClick": true, // if true, closes fancybox when clicking INSIDE the box
            "type": "iframe", // the type of content : iframe for external pages
            //"width": 640, // if type=iframe is always smart to set dimensions
            //"height": 700,
            'scrolling': 'no',
            'titleShow': false,               
            'autoscale': false,               
            'autoDimensions': false
        });
    });
    
    $("#div-table").on("mouseover", ".nickname", function(e) {
        var that = this;
        console.log($(that).attr('playerid'));
        
        $(that).qtip({
            content: {
                //text: "Loading...",
                ajax: {
                    url: "http://ezpz.cz/ext/phpbb/pages/styles/pbtech/template/scripts-generic/getNicknameChanges.php?playerid=" + $(that).attr('playerid'),
                    type: "get",
                    dataType: "html"
                }
            },
            show: {
                ready: true
            },
            style: {
                classes: 'qtip-tipped qtip-shadow',
                tip: {
                    width: 100
                }
            },
            hide: {
                fixed: true,
                delay: 300
            },
            position: {
                my: 'top center',
                at: 'bottom center',
                target: $(that),
                adjust: {
                    y: 10
                }
            }
        });
    });
        
    //loadTable();
});