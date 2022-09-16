var container_mainer = $("#main_without_search");
$("#search_text").keyup(
    function() {
        let searchText = $("#search_text").val();
        if (document.getElementById("search_text").value.length > 2) {
            $("#recherche_place").removeClass("d-none");
            container_mainer.addClass("d-none");
            $.get(
                "../../admin/search-produit.php", { s: searchText },
                function(data) {
                    $('#recherche_place').html(data);
                }
            );

        } else {
            $("#recherche_place").addClass("d-none");
            container_mainer.removeClass("d-none");
        }

    }
);