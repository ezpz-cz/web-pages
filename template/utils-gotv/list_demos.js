var lang;

$(document).ready(function ()
{
    lang = $("langinfo").attr("value");

    function loadTable()
    {
        console.log("Loading table...");

        $("#div-table").html("<div id='div-loader'><img src='http://ezpz.cz/ext/phpbb/pages/styles/pbtech/theme/gears.gif' alt='Loading...' style='display: block; margin-left: auto; margin-right: auto;' /></div>");

        var url = "http://ezpz.cz/ext/phpbb/pages/styles/pbtech/template/utils-gotv/demo_list.php?"
            + "server_id=" + encodeURIComponent($("#select-server").find(":selected").attr("server_id"))
            + "&lang=" + encodeURIComponent(lang)
            + "&map=" + encodeURIComponent($("#input-map").val());

        $.ajax({
            url: url,
            success: function(result) {
                $("#div-table").html(result.data);

                if (result.success)
                {
                    $('#table-gotv').DataTable({
                        "order": [[ 0, 'desc' ]],
                        "scrollX": true
                    });
                }
            }
        });
    }

    $('body').on("click", "#button-search", function (e) {
        loadTable();
    });

    $('body').on("change", "#select-server", function (e) {
        loadTable();
    });

    loadTable();
});