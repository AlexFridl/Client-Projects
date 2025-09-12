$(document).ready(function () {
    let trenutnoAktivnaKategorija = null;
    //Add Description on Category / Kategorije
    $(document).on('click', 'a.link_kategorije', function (e) {
        // console.log('kategorije sa i bez podkategorija');
        e.preventDefault();
        let id_tt = $(this).data('id_tt');
        let id_tretman = $(this).data('id_t');
        let id_kategorija = $(this).data('id_kategorija');

         // Ako je već prikazana ova kategorija - skloni sadržaj
        if (trenutnoAktivnaKategorija === id_kategorija) {
            $('#podaci').html('');
            trenutnoAktivnaKategorija = null;
            return;
        }
        trenutnoAktivnaKategorija = id_kategorija;

        let url = baseUrl + `/tretmani/${id_tt}/${id_tretman}/${id_kategorija}`;

        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                console.log(response.status);
                let html = '';
                let sidebar = '';

                if (response.status == 'sa_podkategorijama') {
                    // ima podkategorije - otvara novu stranu sa tekstom kategorije i sidebar-om sa spiskom podkategorija
                    sidebar += `<div class="sidebar col-md-3 pl-5" >
                                        <nav class="mt-3 mb-3">
                                            <ul class="nav flex-column" id="nav_accordion">`;
                    $.each(response.podkategorije, function (index, podk) {
                        url_podkat = url + `/${podk.id_podkategorija}`;
                        sidebar += `<li class="nav-item">
                                        <a class="nav-link tekst link_podkategorije"
                                            href="${url_podkat}"
                                            data-id_podkategorija="${podk.id_podkategorija}"
                                            data-id_kategorija="${id_kategorija}"
                                            data-id_t="${id_tretman}"
                                            data-id_tt="${id_tt}"
                                            >
                                            ${podk.podkat_naziv}
                                        </a>
                                    </li>`;
                    });
                    sidebar += `</ul>
                            </nav>
                        </div>`;

                    html += `<div class="row justify-content-center">
                                ${sidebar}
                                <div class="col-md-8 ml-5 mb-3">
                                    <h3>${response.kategorija.kat_naziv}</h3>
                                    <div class="tekst aktivanNeaktivan mt-3 px-3">
                                        ${response.kategorija.text_kat !== null ? response.kategorija.text_kat : ''}
                                    </div>
                                    <div class="tekst aktivanNeaktivan mt-3 px-3" id="podaci_podkategorije"></div>
                                </div>
                            </div>
                            `;
                    $('#podaci_kategorije').html('');
                    $('#podaci_kategorije').html(html);
                }
                else if (response.status == 'bez_podkategorija') {
                    // nadovezuje tekst kategorije na tekst tretmana (nema podkategorije)
                    console.log(response);
                    html += `<div class="row justify-content-center mb-3 ">
                                    <div class="col-md-8 text-center mx-auto">
                                        <h3>${response.kategorija.kat_naziv}</h3>
                                        <div class="tekst aktivanNeaktivan multi-column-text">${response.kategorija.text_kat}</div>
                                    </div>
                                </div>
                            `;
                    $('#podaci').html('');
                    $('#podaci').html(html);
                }
                else {
                    alert("Greska!");
                }
            },
            error: function (xhr, status, error) {
                alert('Greška prilikom učitavanja sadržaja.');
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });

    let trenutnoAktivnaPodkategorija = null;
    //Add Description on SubCategory / Podkategorije
    $(document).on('click', 'a.link_podkategorije', function (e) {
        e.preventDefault();
        let id_tt = $(this).data('id_tt');
        let id_tretman = $(this).data('id_t');
        let id_kategorija = $(this).data('id_kategorija');
        let id_podkategorija = $(this).data('id_podkategorija');


        // Ako se klikne na istu podkategoriju, sakrij i resetuj
        if (trenutnoAktivnaPodkategorija === id_podkategorija) {
            $('#podaci_podkategorije').html('');
            trenutnoAktivnaPodkategorija = null;
            return;
        }

    trenutnoAktivnaPodkategorija = id_podkategorija;

        let url = baseUrl + `/tretmani/${id_tt}/${id_tretman}/${id_kategorija}/${id_podkategorija}`;
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log('evo me');
                console.log(response);
                let html = '';
                let sidebar = '';

                if (response.status == 'podkategorija') {
                    html += `<h4>${response.podkategorija.podkat_naziv}</h4>
                            <div class="tekst aktivanNeaktivan podkat_visible ">
                                ${response.podkategorija.tekst_podkat !== null ? response.podkategorija.tekst_podkat : ''}
                            </div>
                            `;
                    $('#podaci_podkategorije').html(html);
                }
            },
            error: function (xhr, status, error) {
                alert('Greška prilikom učitavanja sadržaja.');
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });

    //Blog1 - Search - RADI
    $('#btnSearchBlog1').click(function () {
        $unos = $('#searchBlog1').val();
        $ispis = $('#ispis');
        console.log($unos);

        $.ajax({
            url: baseUrl + '/searchBlog1',
            type: 'GET',
            data: { unos: $unos },
            dataType: 'json',
            success: function (data, xhr) {
                console.log(data);
                console.log(xhr);
                $ispis.html('');
                $ispis.html(data);
            },
            error: function (xhr, status, error) {
                // alert(xhr + " " + status + " " + error);
                console.log("Greska");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });
    //Blog1 - Search on enter - RADI
    $('#searchBlog1').keypress(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            $('#searchBlog1').submit();
            $unos = $('#searchBlog1').val();
            $ispis = $('#ispis');
            console.log($unos);

            $.ajax({
                url: baseUrl + '/searchBlog1',
                type: 'GET',
                data: { unos: $unos },
                dataType: 'json',
                success: function (data, xhr) {
                    console.log(data);
                    console.log(xhr);
                    $ispis.html('');
                    $ispis.html(data);
                },
                error: function (xhr, status, error) {
                    // alert(xhr + " " + status + " " + error);
                    console.log("Greska");
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
            return false;
        }
    });

    //Blog 2 - Search - RADI
    $('#searchBlog2').keyup(function () {
        $unos = $(this).val();
        console.log('pozzz');
        $url = baseUrl + '/searchBlog2';

        $.ajax({
            url: $url,
            type: 'GET',
            data: { unos: $unos },
            success: function (response) {
                 console.log(response);
                $('#search_blog2').html(response.html);
            }
        });
    });

    // Blog2 - Search on Enter - RADI
    $('#searchBlog2').keypress(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            console.log('poz');
            $('#searchBlog2').submit();
            $unos = $('#searchBlog2').val();
            $ispis = $('#blog_search');
            $html = '';
            $url = baseUrl + '/searchBlog2';
            $url_one_blog = baseUrl + '/one_Blog';

            $.ajax({
                url: baseUrl + '/searchBlog2',
                type: 'GET',
                data: { unos: $unos, _token: token },
                dataType: 'json',
                success: function (data, xhr) {
                    console.log(data.blog.data);
                    $html += `<div class="row justify-content-center" style="padding-bottom: 50px;">`
                        $.each(data.blog.data, function (index, blog_one){
                            $html += `<div class="row justify-content-between mb-5">`;
                                if(index % 2 === 0){
                                    $html +=`<div class="col-lg-4 col-md-4 col-sm-4 text-center mt-2 ml-5 mr-5 d-flex justify-content-center align-items-center overflow-hidden object-fit-contain"
                                                style="border:3px solid #515828;border-radius:5px;">
                                                <img class=" mb-2 radius mt-2 w-auto h-auto img-fluid"
                                                    src="img/blog/${ blog_one['putanja_slika_blog']}"  alt="${ blog_one['naslov_blog'] }"/>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 mt-5">
                                                <h2>
                                                    <a href="${ $url_one_blog }/${blog_one['id_blog']}">${ blog_one['naslov_blog'] }</a>
                                                </h2>
                                                <p class="aktivanNeaktivan mt-3">
                                                    ${blog_one['text_blog'].substring(0,200)} (...)
                                                </p>
                                                <a href="${ $url_one_blog }/${blog_one['id_blog']}" class="navigacija" class="btn_3">
                                                    <b>Više</b>
                                                </a>
                                            </div>
                                            `;
                                }
                                else{
                                    $html += `<div class="col-lg-6 col-sm-6 mt-5 ml-5 mr-5">
                                                <h2>
                                                    <a href="${ $url_one_blog }/${blog_one['id_blog']}">${ blog_one['naslov_blog'] }</a>
                                                </h2>
                                                <p class="aktivanNeaktivan mt-3">
                                                    ${blog_one['text_blog'].substring(0,200)} (...)
                                                </p>
                                                <a href="${ $url_one_blog }/${blog_one['id_blog']}" class="navigacija" class="btn_3">
                                                    <b>Više</b>
                                                </a>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 text-center mt-2 d-flex justify-content-center align-items-center overflow-hidden object-fit-contain"
                                                style="border:3px solid #515828;border-radius:5px;">
                                                <img class=" mb-2 radius mt-2 w-auto h-auto img-fluid"
                                                    src="img/blog/${ blog_one['putanja_slika_blog']}"  alt="${ blog_one['naslov_blog'] }"/>
                                            </div>
                                            `;
                                }
                            $html += `</div>`;
                        });

                    $ispis.html('');
                    $ispis.html( $html );
                },
                error: function (xhr, status, error) {
                    console.log("Greska");
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }
    });

    //Blog3 - Search - RADI
    $('#searchBlog3').keyup(function () {
        $unos = $(this).val();
        console.log('poz');
        console.log($unos);
        $url = baseUrl + '/searchBlog3';

        $.ajax({
            url: $url,
            type: 'GET',
            data: { unos: $unos },
            success: function (response) {
                // console.log('success poz');
                // console.log(response);
                $('#search_blog3').html(response.html);
            }
        });
    });
    // Event for Pagination Blog3
    $(document).on('click', '.pagination a', function (e) {
        if (unos !== '') {
            e.preventDefault();
            let url = $(this).attr('href');
            let unos = $('#searchBlog3').val();

            $.ajax({
                url: url,
                type: 'GET',
                data: { unos: unos },
                success: function (response) {
                    $('#search_blog3').html(response.html);
                }
            });
        }
    });

    //Prikaz kategorija na insert slike za galeriju
    $('#ddlTretmana').change(function () {
        $choosen = $('#ddlTretmana').val();
        console.log($choosen);

        $ispis_kategorija = $('#ispis_kategorije');
        $ispis_kategorija_data = '';

        $.ajax({
            url: baseUrl + '/adminPanel_galerija_tretman_kat',
            type: 'POST',
            data: { choosen: $choosen, _token: token },
            dataType: 'json',
            success: function (data, xhr) {
                console.log(data);
                if (data.length > 0) {
                    $('#show_kategorije').show();
                    $ispis_kategorija_data =
                        "<td class='izmena' id='ispis_kategorije'>" +
                        "<select id='ddlKategorija' name='ddlKategorija' class='aktivanNeaktivan'>" +
                        "<option value='0'>Izaberi...</option>";

                    $.each(data, function (index, element) {
                        $ispis_kategorija_data += "<option value='" + element['id_kategorija']
                            + "'>" + element['kat_naziv'] + "</option>";
                    });

                    $ispis_kategorija_data +=
                        "</select>" +
                        "</td>";

                    $ispis_kategorija.html('');
                    $ispis_kategorija.html($ispis_kategorija_data);

                    $('#ddlTretmana').change(function () {
                        $choosen = $('#ddlTretmana').val();
                        console.log($choosen);

                        $.ajax({
                            url: baseUrl + '/adminPanel_galerija_tretman_kat',
                            type: 'POST',
                            data: { choosen: $choosen, _token: token },
                            dataType: 'json',
                            success: function (data, xhr) {
                                console.log(data);
                                if (data.length > 0) {
                                    $('#show_kategorije').show();
                                    $ispis_kategorija_data =
                                        "<td class='izmena' id='ispis_kategorije'>" +
                                        "<select id='ddlKategorija' name='ddlKategorija' class='aktivanNeaktivan'>" +
                                        "<option value='0'>Izaberi...</option>";

                                    $.each(data, function (index, element) {
                                        $ispis_kategorija_data += "<option value='" + element['id_kategorija']
                                            + "'>" + element['kat_naziv'] + "</option>";
                                    });

                                    $ispis_kategorija_data +=
                                        "</select>" +
                                        "</td>";

                                    $ispis_kategorija.html('');
                                    $ispis_kategorija.html($ispis_kategorija_data);
                                }
                                else {
                                    $('#show_kategorije').hide();
                                }
                            },
                            error: function (xhr, status, error) {
                                console.log(xhr);
                                console.log(status);
                                console.log(error);
                            }
                        });
                    });

                }
                $('#ddlKategorija').change(function () {
                    $choosen_kategorija = $('#ddlKategorija').val();
                    console.log($choosen_kategorija);

                    $ispis_podkategorija = $('#ispis_podkategorije');
                    $ispis_podkategorija_data = '';

                    $.ajax({
                        url: baseUrl + '/adminPanel_galerija_tretman_kat_podkat',
                        type: 'POST',
                        data: { choosen_kategorija: $choosen_kategorija, _token: token },
                        dataType: 'json',
                        success: function (data_podkategorija, xhr) {
                            if (data_podkategorija.length > 0) {

                                $('#show_podkategorije').show();
                                $ispis_podkategorija_data =
                                    "<td class='izmena' id='ispis_podkategorije'>" +
                                    "<select id='ddlPodkategorija' name='ddlPodkategorija' class='aktivanNeaktivan'>" +
                                    "<option value='0'>Izaberi...</option>";

                                $.each(data_podkategorija, function (index, element1) {
                                    $ispis_podkategorija_data += "<option value='" + element1['id_podkategorija']
                                        + "'>" + element1['podkat_naziv'] + "</option>";
                                });
                                $ispis_podkategorija_data +=
                                    "</select>" +
                                    "</td>";

                                $ispis_podkategorija.html('');
                                $ispis_podkategorija.html($ispis_podkategorija_data);
                            }
                            else {
                                $('#show_podkategorije').hide();
                            }
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        }
                    });
                });
            },
            error: function (xhr, status, error) {
                console.log("Greska");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });

    //Filtriranje datuma bloga - admin strani - blog
    $('#sortByDateBlogAP').change(function () {

        // $unos = $('input[name="sortByDateBlogAP"]').val();
        $unos = $('#sortByDateBlogAP').val();
        $url = baseUrl + '/sortByDate_blog';
        $.ajax({
            url: $url,
            type: 'GET',
            data: { unos: $unos },
            success: function (response) {
                console.log("Upseh!");
                console.log(response.html);
                $('#blog_table').html(response.html);
            },
            error: function (xhr, status, error) {
                console.log("Greska!");
                console.log(error);
            }
        });
    });
    // Admin Serach - Blog Event for Pagination Blog
    $(document).on('click', '.pagination a', function (e) {
        if (unos !== '') {
            e.preventDefault();
            let url = $(this).attr('href');
            let unos = $('#sortByDateBlogAP').val();

            $.ajax({
                url: url,
                type: 'GET',
                data: { unos: unos },
                success: function (response) {
                    $('#blog_table').html(response.html);
                }
            });
        }
    });

    //Filtriranje datuma galerije - admin strani - galerija
    // $('#sortByDateGalerijaAP').change(function () {

    //     $unos = $('input[name="sortByDateGalerijaAP"]').val();
    //     $ispis = $("#ispis");

    //     $.ajax({
    //         url: baseUrl + '/sortByDate_galerija',
    //         type: 'POST',
    //         data: { unos: $unos, _token: token },
    //         dataType: 'json',
    //         success: function (data, xhr) {
    //             console.log("Upseh!");
    //             $ispis.html("");
    //             $ispis.html(data);
    //         },
    //         error: function (xhr, status, error) {
    //             console.log("Greska!");
    //             console.log(xhr);
    //             console.log(status);
    //             console.log(error);
    //         }
    //     });
    // });

    //Filtriranje datuma bloga - bloger
    // $('#sortByDateBlog').change(function () {

    //     $unos = $('input[name="sortByDateBlog"]').val();
    //     $ispis = $("#ispis");

    //     $.ajax({
    //         url: baseUrl + '/sortByDateBlog',
    //         type: 'POST',
    //         data: { unos: $unos, _token: token },
    //         dataType: 'json',
    //         success: function (data, xhr) {
    //             console.log("Upseh!");
    //             $ispis.html("");
    //             $ispis.html(data);
    //         },
    //         error: function (xhr, status, error) {
    //             console.log("Greska!");
    //             console.log(xhr);
    //             console.log(status);
    //             console.log(error);
    //         }
    //     });
    // });

    //Search na Blog1 stranici - bez logovanja
    // $('#btnSearchBlog1').click(function () {
    //     $unos = $('input[name="searchBlog1"]').val();
    //     $ispis = $('#ispis');
    //     $.ajax({
    //         url: baseUrl + '/searchBlog1',
    //         type: 'POST',
    //         data: { unos: $unos, _token: token },
    //         dataType: 'json',
    //         success: function (data, xhr) {
    //             console.log(xhr);
    //             $ispis.html('');
    //             $ispis.html(data);
    //         },
    //         error: function (xhr, status, error) {
    //             console.log("Greska");
    //             console.log(xhr);
    //             console.log(status);
    //             console.log(error);
    //         }
    //     });
    // });

    //Search na Blog1 stranici - bloger
    // $('#btnSearchBloger1').click(function () {
    //     $unos = $('input[name="search"]').val();
    //     $ispis = $('#ispis');
    //     $.ajax({
    //         url: baseUrl + '/searchBloger',
    //         type: 'POST',
    //         data: { unos: $unos, _token: token },
    //         dataType: 'json',
    //         success: function (data, xhr) {
    //             console.log(xhr);
    //             $ispis.html('');
    //             $ispis.html(data);
    //         },
    //         error: function (xhr, status, error) {
    //             console.log("Greska");
    //             console.log(xhr);
    //             console.log(status);
    //             console.log(error);
    //         }
    //     });
    // });

    //Search na Blog1 stranici - bloger
    // $('#btnSearchBloger1').click(function () {
    //     $unos = $('input[name="search"]').val();
    //     $ispis = $('#ispis');
    //     $.ajax({
    //         url: baseUrl + '/searchBloger',
    //         type: 'POST',
    //         data: { unos: $unos, _token: token },
    //         dataType: 'json',
    //         success: function (data, xhr) {
    //             console.log(xhr);
    //             $ispis.html('');
    //             $ispis.html(data);
    //         },
    //         error: function (xhr, status, error) {
    //             console.log("Greska");
    //             console.log(xhr);
    //             console.log(status);
    //             console.log(error);
    //         }
    //     });
    // });

    //Search na Galerija stranici - bez logovanja
    // $('#btnSearchGalerija').click(function () {
    //     $unos = $('input[name="searchGalerija"]').val();
    //     $ispis = $('#ispis');
    //     $.ajax({
    //         url: baseUrl + '/searchGalerija',
    //         type: 'POST',
    //         data: { unos: $unos, _token: token },
    //         dataType: 'json',
    //         success: function (data, xhr) {
    //             console.log(xhr);
    //             $ispis.html('');
    //             $ispis.html(data);
    //         },
    //         error: function (xhr, status, error) {
    //             console.log("Greska");
    //             console.log(xhr);
    //             console.log(status);
    //             console.log(error);
    //         }
    //     });
    // });


    //Search na blogu - bloger
    // $('#btnSearchBloger').click(function () {
    //     $unos = $('input[name="searchBloger"]').val();
    //     $ispis = $('#ispis');
    //     alert($unos);
    //     $.ajax({
    //         url: baseUrl + '/searchBlog',
    //         type: 'POST',
    //         data: { unos: $unos, _token: token },
    //         dataType: 'json',
    //         success: function (data, xhr) {
    //             console.log(xhr);
    //             $ispis.html('');
    //             $ispis.html(data);
    //         },
    //         error: function (xhr, status, error) {
    //             console.log("Greska");
    //             console.log(xhr);
    //             console.log(status);
    //             console.log(error);
    //         }
    //     });
    // });

    // Admin Serach - Tretmani
    $('#formSearchTretmani').on('submit', function (e) {
        e.preventDefault(); //da spreci submitovaje forme na enter i resetovanje pretrage
    });
    $('#searchTretmani').keyup(function () {
        $unos = $(this).val().trim();
        $id_tt = window.location.href.split('/').pop();

        $url = baseUrl + '/searchTretmani/' + $id_tt;
        $.ajax({
            url: $url,
            type: 'GET',
            data: { unos: $unos },
            success: function (response) {
                $('#search_tretman').html(response.html);
            },
            error: function(xhr){
                console.log('Greska u AJAX zahtevu:', xhr);
            }
        });
    });
    // Admin Serach - Tretmani Event for Pagination Tretmani
    $(document).on('click', '.pagination a', function (e) {
        if (unos !== '') {
            e.preventDefault();
            let url = $(this).attr('href');
            let unos = $('#searchTretmani').val();

            $.ajax({
                url: url,
                type: 'GET',
                data: { unos: unos },
                success: function (response) {
                    $('#searchTretmani').html(response.html);
                }
            });
        }
    });

    // Admin Serach - Kategorije
    $('#formSearchKategorije').on('submit', function (e) {
        e.preventDefault(); //da spreci submitovaje forme na enter i resetovanje pretrage
    });
    $('#searchKeategorije').keyup(function () {
        $search = $(this).val();
        console.log($search);

        $url = baseUrl + '/searchKategorije';

        $.ajax({
            url: $url,
            type: 'GET',
            data: { search: $search },
            success: function (response) {
                $('#search_kategorija').html(response.html);
            }
        });
    });
    // Admin Kategorije - Kategorije Event for Pagination Kategorije
    $(document).on('click', '.pagination a', function (e) {
        if (search !== '') {
            e.preventDefault();
            let url = $(this).attr('href');
            let search = $('#searchKeategorije').val();

            $.ajax({
                url: url,
                type: 'GET',
                data: { search: search },
                success: function (response) {
                    $('#search_kategorija').html(response.html);
                }
            });
        }
    });

     // Admin Serach - Podkategorije
    $('#formSearchPodkategorije').on('submit', function (e) {
        e.preventDefault();
    });

    $('#searchPodkategorije').keyup(function () {
        $search = $(this).val();

        $url = baseUrl + '/searchPodkategorije?page=1';

        $.ajax({
            url: $url,
            type: 'GET',
            data: { search: $search },
            success: function (response) {
                console.log(response);
                $('#search_podkategorija').html(response.html);
            }
        });
    });
    // Admin Podkategorije - Podkategorije Event for Pagination Podkategorije
    $(document).on('click', '.pagination a', function (e) {
        if (search !== '') {
            e.preventDefault();
            let url = $(this).attr('href');
            let search = $('#searchPodkategorije').val();

            $.ajax({
                url: url,
                type: 'GET',
                data: { search: search },
                success: function (response) {
                    $('#search_podkategorija').html(response.html);
                }
            });
        }
    });
    //Admin Slajder - Sort slika za slajder
    //klink na dugme Sortiraj

    $('#btnSort').on('click', sortirajSlajder);

    //submitovanje dugmeta Sortiraj na enter
    $('#sortTable').on('keydown', '.sort_value', function (e) {
        if(e.keyCode === 13) { // Enter key
            console.log('Enter key pressed');
            e.preventDefault();
            sortirajSlajder(e);
        }
    });


// zatvara jquery
});

function sortirajSlajder(e) {
     e.preventDefault();
        let sortData = [];
        let token = $('input[name="_token"]').val();
        let values = [];
        let hasDuplicates = false;

        $('.sort_value').removeClass('is-invalid');
        $('.error_message').remove();

        $('#sortTable tbody tr').each(function () {
            let id_slider = $(this).find('.id_slider').val();
            let sort_value = $(this).find('.sort_value').val();

            if(values.includes(sort_value)) {
                hasDuplicates = true;
                $(this).find('.sort_value').addClass('is-invalid border-danger')
                        .after('<div class="text-danger error_message">Ne duplirati poziciju!</div>');
            }
            else{
               values.push(sort_value);
            }
            sortData.push({ id_slider: id_slider, sort_value: sort_value });
        });
        if(hasDuplicates) {
            console.log("Ne ulazi u ajax");
            return;
            // dodati ako je inicijalno sa dve iste pozicije poruka i border-danger
        }
        console.log(sortData);
        $.ajax({
            url: baseUrl + '/sort',
            type: 'POST',
            traditional: true,
            contentType: 'application/json',
            data: JSON.stringify({ sortData: sortData, _token: token }),
            success: function (response) {
                console.log("Uspesno sacuvano!");
                // location.reload();
                $('.poruka').html(response.message);
                $('.sort_value').removeClass('is-invalid  border-danger');
                $('.error_message').remove();
            },
            error: function (xhr, status, error) {
                console.log("Greska!");
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
}




