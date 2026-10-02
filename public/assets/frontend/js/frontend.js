document.addEventListener(
    "DOMContentLoaded",
    function () {

        const menu =
            document.getElementById(
                "siteMobileMenu"
            );

        const openButton =
            document.getElementById(
                "siteMenuToggle"
            );

        const closeButton =
            document.getElementById(
                "siteMenuClose"
            );

        const overlay =
            document.getElementById(
                "siteMenuOverlay"
            );

        // document.addEventListener(
        //     "click",
        //     function (event) {

        //         console.log(
        //             "CLICKED ELEMENT:",
        //             event.target
        //         );

        //         console.log(
        //             "CLOSEST LINK:",
        //             event.target.closest("a")
        //         );

        //         console.log(
        //             "INSIDE MOBILE MENU:",
        //             !!event.target.closest(
        //                 "#siteMobileMenu"
        //             )
        //         );

        //     }
        // );



        function openMenu() {

            if (!menu) {
                return;
            }

            menu.classList.add("open");

            if (overlay) {
                overlay.classList.add("show");
            }

            if (openButton) {
                openButton.setAttribute(
                    "aria-expanded",
                    "true"
                );
            }

            document.body.classList.add(
                "menu-open"
            );
        }


        function closeMenu() {

            if (!menu) {
                return;
            }

            menu.classList.remove("open");

            if (overlay) {
                overlay.classList.remove(
                    "show"
                );
            }

            if (openButton) {
                openButton.setAttribute(
                    "aria-expanded",
                    "false"
                );
            }

            document.body.classList.remove(
                "menu-open"
            );
        }


        if (openButton) {
            openButton.addEventListener(
                "click",
                openMenu
            );
        }


        if (closeButton) {
            closeButton.addEventListener(
                "click",
                closeMenu
            );
        }


        if (overlay) {
            overlay.addEventListener(
                "click",
                closeMenu
            );
        }

        /*
|--------------------------------------------------------------------------
| MOBILE MENU LINKS
|--------------------------------------------------------------------------
|
| Menu link click:
| 1. Drawer close hoga
| 2. Browser href wale page par navigate karega
|
*/




        document.addEventListener(
            "keydown",
            function (event) {

                if (event.key === "Escape") {
                    closeMenu();
                }
            }
        );


        window.addEventListener(
            "resize",
            function () {

                if (
                    window.innerWidth > 1050
                ) {
                    closeMenu();
                }
            }
        );

    }
);