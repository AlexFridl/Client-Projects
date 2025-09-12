// Dropdown Menu - Ne ulogovani korisnici

console.log('Dropdown script loaded');
    const isMobile = () => window.innerWidth <= 991;

    function setupDropdowns() {
        const dropdownLinks = document.querySelectorAll('.dropdown-menu a');

        dropdownLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                const submenu = this.parentElement.querySelector('.submenu');

                if (submenu) {
                    e.preventDefault();
                    e.stopPropagation();

                    if (isMobile()) {
                        const isVisible = submenu.classList.contains('show');

                        if (isVisible) {
                            // Ako je već prikazan, zatvori ga
                            submenu.classList.remove('show');
                            submenu.style.display = 'none';
                        }
                        else {

                            // Sakrij sve .submenu unutar trenutnog dropdown nivoa - prvo zatvori sve sestre submenija
                            const siblingSubmenus = this.closest('.dropdown-menu').querySelectorAll('.submenu');
                            siblingSubmenus.forEach(sub => {
                                if(sub !== submenu){
                                    sub.classList.remove('show');
                                    sub.style.display = 'none';
                                }
                                else{
                                    sub.classList.add('show');
                                    sub.style.display = 'block';
                                }
                            });
                        }
                    } else {
                        // Desktop ponašanje: ne radimo ništa na klik
                        e.stopPropagation();
                    }
                }
            });

            // Na većim ekranima otvaranje podmenija na hover
            if (!isMobile()) {
                const submenu = link.parentElement.querySelector('.submenu');

                if (submenu) {
                    link.parentElement.addEventListener('mouseenter', function () {
                        submenu.classList.add('show');
                        submenu.style.display = 'block';
                    });

                    link.parentElement.addEventListener('mouseleave', function () {
                        submenu.classList.remove('show');
                        submenu.style.display = 'none';
                    });
                }
            }
        });

        // Zatvori sve podmenije kada se dropdown zatvori
        document.querySelectorAll('.navbar .dropdown').forEach(drop => {
            drop.addEventListener('hide.dropdown', function () {
                this.querySelectorAll('.submenu').forEach(sub => {
                    sub.classList.remove('show');
                    sub.style.display = 'none';
                });
            });
        });

        // Klik van menija zatvara podmenije
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.dropdown-menu')) {
                document.querySelectorAll('.submenu').forEach(sub => {
                    sub.classList.remove('show');
                    sub.style.display = 'none';
                });
            }
        });
    }

    setupDropdowns();

    // Na promenu veličine prozora resetuj sve i ponovo postavi evente
    window.addEventListener('resize', function () {
        document.querySelectorAll('.submenu').forEach(sub => {
            sub.classList.remove('show');
            sub.style.display = 'none';
        });
        setupDropdowns();
    });

