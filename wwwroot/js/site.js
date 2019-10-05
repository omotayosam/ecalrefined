/**
 * 1. Search
 * 2. Side-Nav
 * 3. Display Shopping-bag fa-icon
 * 4. Display Heart-alt fa-icon
 **/

$(document).ready(function() {

    /*<===================== 1. Search Functions =====================>*/
    $(".search_input").on({
        focus: function() {
            function recentSearch() {
                $.get("include/recent_search.php", function(data, status) {
                    $(".search_result").slideDown("2000");
                    $("#search_result").html(data);

                    if (data.includes('Input search keyword...')) {
                        $(".search_result").hide();
                    }
                });

            }

            if (($(this).val().length) < 1) {
                recentSearch();
            }

            if (($(this).val().length) > 2) {
                $(".search_result").css("display", "block");
            }

            $(this).keyup(function() {
                var input = $(".search_input").val();
                var search = "<b class='h6 text-primary'><span class='text-dark fa fa-xs fa-search'></span> " + input + "</b>";
                var link = "<span class='result'><a href='search?q=" + input + "'><div class='bg-white border-bottom p-1'>" + search + "</div></a></span>";

                function searchResultHtml() {
                    $(".search_result").slideDown("2000");
                    $("#search_result").html(link);
                }

                if (($(this).val().length) < 1) {
                    recentSearch();
                }

                if (($(this).val().length) > 0) {
                    searchResultHtml();
                }

                if (($(this).val().length) > 3) {
                    $.get("include/search.php?q=" + input, function(data) {
                        $("#search_result").html(link + data);

                        if (data.includes('Not Found')) {
                            searchResultHtml();
                        }
                    });
                }
            });
        },
        blur: function() {
            $(".search_result").slideUp(1500);
        }
    });

    $(".search_clear").click(function() {
        if ($(".search_input").val().length > 0) {
            $(".search_input").val("").fade(3000);
            $("#search_result").html("");
        }
    });
    /*<===================== End Search Functions =====================>*/

    /*<===================== 2. Side-nav Functions =====================>*/
    // Responsive Side-nav
    $(window).resize(function() {
        if (($(document).width()) <= 450) {
            $('#sidenav').css({
                "width": "80%"
            });

        } else if (($(document).width()) <= 800) {
            $('#sidenav').css({
                "width": "65%"
            });

        } else if (($(document).width()) <= 1200) {
            $('#sidenav').css({
                "width": "50%"
            });

        } else if (($(document).width()) <= 1600) {
            $('#sidenav').css({
                "width": "30%"
            });

        } else {
            $('#sidenav').css({
                "width": "25%"
            });
        }
    });

    // Open Responsive Side-nav
    $('#sidenav-open').on({
        click: function() {
            $('#sidenav').css({
                "transition": "left 2s",
                "left": "0%"
            });

            if (($(document).width()) <= 450) {
                $('#sidenav').css({
                    "width": "80%"
                });

            } else if (($(document).width()) <= 800) {
                $('#sidenav').css({
                    "width": "65%"
                });

            } else if (($(document).width()) <= 1200) {
                $('#sidenav').css({
                    "width": "50%"
                });

            } else if (($(document).width()) <= 1600) {
                $('#sidenav').css({
                    "width": "30%"
                });

            } else {
                $('#sidenav').css({
                    "transition": "left 2s",
                    "left": "0%",
                    "width": "25%"
                });
            }

            $('.sidenav-overlay').css("display", "block");
        }
    });

    /*------------ Side-nav Drop Links ------------*/
    // Function to drop links in side-nav
    function navDrop(id) {
        $('#nav-drop-' + id).on({
            click: function(event) {
                event.preventDefault();
                $('.nav-drop-' + id).slideToggle('slow', function() {
                    $(".dropicon", '#nav-drop-' + id).removeClass("important fa-plus");
                    $(".dropicon", '#nav-drop-' + id).addClass("important fa-minus");

                    if (($('.nav-drop-' + id).css('display')) == 'none') {
                        $(".dropicon", '#nav-drop-' + id).removeClass("important fa-minus");
                        $(".dropicon", '#nav-drop-' + id).addClass("important fa-plus");
                    }
                });

            },
        });
    }

    // Add more accordingly (Drop links)
    navDrop(1);
    /*------------ /Side-nav Drop Links ------------*/

    /*------------ Close Side-nav ------------*/
    // Function to close the side-nav
    function closeSidenav(selector) {
        $(selector).on({
            click: function() {
                $('#sidenav').css({
                    "transition": "left 2.5s",
                    "left": "-86%"
                });
                $('#sidenav-open').css("display", "block");
                $('.sidenav-overlay').css({
                    "display": "none"
                });
            }
        });
    }

    // Close side-nav when the sidenav-overlay is clicked
    closeSidenav('.sidenav-overlay');

    // Close side-nav when the close button is clicked
    closeSidenav('#sidenav_close');
    /*------------ /Close Side-nav ------------*/
    /*<===================== End of Side-nav Functions =====================>*/

    /*<===================== 3. Display Shopping-bag fa-icon =====================> */
    $(".salebutton").on({
        mouseenter: function() {
            $(".fa", this).addClass("important fa-shopping-bag");
            $(".fa", this).css({
                "right": "22px",
                "position": "relative"
            });
        },
        mouseleave: function() {
            $(".fa", this).removeClass("important fa-shopping-bag");
        }
    });
    /*<===================== End of Display Shopping-bag fa-icon =====================> */

    /*<===================== 4. Display/Remove Heart-alt fa-icon =====================> */
    $('.wish').on({
        mouseenter: function() {
            $('.heart', this).removeClass('far').addClass('fa');
        },
        mouseleave: function() {
            $('.heart', this).removeClass('fa').addClass('far');
        }
    });
    $('.heart').on({
        mouseenter: function() {
            $(this).removeClass('far').addClass('fa');
            $('i', this).removeClass('far').addClass('fa');
        },
        mouseleave: function() {
            $(this).removeClass('fa').addClass('far');
            $('i', this).removeClass('fa').addClass('far');
        }
    });
    $('.heart-remove').on({
        mouseenter: function() {
            $('i', this).removeClass('fa').addClass('far');
        },
        mouseleave: function() {
            $('i', this).removeClass('far').addClass('fa');
        }
    });
    /*<===================== End of Display Heart-alt fa-icon =====================> */

    /*<===================== 5. Add/Edit Address Functions =====================> */
    $('.edit-address').on({
        click: function(event) {
            event.preventDefault();

            $('.edit-address-form').show('slow');
            $('.address-overlay').fadeIn('slow');
            // alert($(this).data('id'))
            var id = $(this).data('id');

            $('#edit-address-form').submit(function(event) {
                event.preventDefault();

                $('#edit-address-form').ajaxSubmit({
                    url: 'profile_actions/edit_address.php',
                    method: 'POST',
                    data: {
                        id: id
                    },
                    success: function(result) {
                        $('#address-mess').html(result);
                        $('#address-mess').show('3000', function() {
                            $('#address-mess').delay('3000').hide('3000', function() {
                                window.location.reload();
                            });
                        });
                    }
                });
            });
        }
    });
    $('.add-address').on({
        click: function(event) {
            event.preventDefault();

            $('.edit-address-form').show('slow');
            $('.address-overlay').fadeIn('slow');
            // alert($(this).data('id'))
            var dataId = $(this).data('id');
            // alert(dataId);

            $('#edit-address-form').submit(function(event) {
                event.preventDefault();

                $('#edit-address-form').ajaxSubmit({
                    url: 'profile_actions/add_address.php',
                    method: 'POST',
                    data: {
                        dataId: dataId
                    },
                    success: function(result) {
                        $('#address-mess').html(result);
                        $('#address-mess').show('3000', function() {
                            $('#address-mess').delay('3000').hide('3000', function() {
                                window.location.reload();
                            });
                        });
                    }
                });
            });
        }
    });
    $('#state-sel').on({
        change: function() {
            var state_id = $(this.options[this.selectedIndex]).attr('id');

            $.post("profile_actions/lga.php?state_id=" + state_id, function(data) {
                $("#lga-sel").html(data);
                $("#lga-sel").removeAttr('disabled');
            });
        }
    });
    /*------------ Close Address Pop-up ------------*/
    // Function to close the Address Pop-up
    function closeAddressOvelay(selector) {
        $(selector).on({
            click: function(event) {
                event.preventDefault();

                $('.edit-address-form').hide('slow');
                $('.address-overlay').fadeOut('slow');
            }
        });
    }

    // Close Address Pop-up when the address-overlay is clicked
    closeAddressOvelay('.address-overlay');

    // Close Address Pop-up when the close button is clicked
    closeAddressOvelay('#close-edit-address');
    /*------------ /Close Address Pop-up ------------*/
    /*<===================== 5. Add/End of Edit Address Functions =====================> */
});