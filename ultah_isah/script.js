document.addEventListener(
    "DOMContentLoaded",
    () => {

        /* =================================
           ELEMENTS
        ================================= */

        const book =
            document.getElementById("book");

        const cover =
            document.getElementById("cover");

        const nextBtn =
            document.getElementById("nextBtn");

        const prevBtn =
            document.getElementById("prevBtn");

        const dots =
            document.querySelectorAll(".dot");

        const confetti =
            document.getElementById("confetti");


        /* =================================
           STATE
        ================================= */

        let opened = false;

        let currentPage = 0;

        let animating = false;


        /* =================================
           OPEN BOOK
        ================================= */

        cover.addEventListener(
            "click",
            () => {

                if (opened) {
                    return;
                }

                opened = true;

                book.classList.add("open");

                createConfetti();

            }
        );


        /* =================================
           NEXT PAGE
        ================================= */

        nextBtn.addEventListener(
            "click",
            () => {

                if (!opened) {
                    return;
                }

                if (currentPage >= 1) {
                    return;
                }

                if (animating) {
                    return;
                }


                animating = true;


                /*
                    Tambahkan class flipping
                    untuk efek shadow
                */

                book.classList.add(
                    "page-flipping"
                );


                /*
                    Tunggu frame browser
                    supaya transform
                    bisa dianimasikan
                */

                requestAnimationFrame(
                    () => {

                        requestAnimationFrame(
                            () => {

                                book.classList.add(
                                    "page-flipped"
                                );

                            }
                        );

                    }
                );


                /*
                    Durasi sama dengan
                    animasi CSS
                */

                setTimeout(
                    () => {

                        currentPage = 1;

                        animating = false;

                        book.classList.remove(
                            "page-flipping"
                        );

                        updateNavigation();

                    },
                    1400
                );

            }
        );


        /* =================================
           PREVIOUS PAGE
        ================================= */

        prevBtn.addEventListener(
            "click",
            () => {

                if (!opened) {
                    return;
                }

                if (currentPage <= 0) {
                    return;
                }

                if (animating) {
                    return;
                }


                animating = true;


                book.classList.add(
                    "page-flipping"
                );


                /*
                    Balik halaman
                */

                book.classList.remove(
                    "page-flipped"
                );


                /*
                    Tunggu halaman
                    selesai berputar
                */

                setTimeout(
                    () => {

                        currentPage = 0;

                        animating = false;

                        book.classList.remove(
                            "page-flipping"
                        );

                        updateNavigation();

                    },
                    1400
                );

            }
        );


        /* =================================
           NAVIGATION
        ================================= */

        function updateNavigation() {

            dots.forEach(
                (dot, index) => {

                    dot.classList.toggle(
                        "active",
                        index === currentPage
                    );

                }
            );


            prevBtn.disabled =
                currentPage === 0;


            nextBtn.disabled =
                currentPage === 1;

        }


        /* =================================
           KEYBOARD
        ================================= */

        document.addEventListener(
            "keydown",
            (event) => {

                if (!opened) {
                    return;
                }


                if (
                    event.key === "ArrowRight"
                ) {

                    nextBtn.click();

                }


                if (
                    event.key === "ArrowLeft"
                ) {

                    prevBtn.click();

                }

            }
        );


        /* =================================
           SWIPE MOBILE
        ================================= */

        let startX = 0;


        book.addEventListener(
            "touchstart",
            (event) => {

                startX =
                    event
                        .changedTouches[0]
                        .screenX;

            },
            {
                passive: true
            }
        );


        book.addEventListener(
            "touchend",
            (event) => {

                if (!opened) {
                    return;
                }


                if (animating) {
                    return;
                }


                const endX =
                    event
                        .changedTouches[0]
                        .screenX;


                const distance =
                    endX - startX;


                if (
                    Math.abs(distance) < 50
                ) {

                    return;

                }


                if (distance < 0) {

                    nextBtn.click();

                } else {

                    prevBtn.click();

                }

            },
            {
                passive: true
            }
        );


        /* =================================
           CONFETTI
        ================================= */

        function createConfetti() {

            const colors = [

                "#8c4559",
                "#d99aa8",
                "#f3c27b",
                "#a7c7b7",
                "#e9a6b5",
                "#7b8fa1",
                "#ffffff"

            ];


            for (
                let i = 0;
                i < 140;
                i++
            ) {

                const piece =
                    document.createElement(
                        "span"
                    );


                piece.className =
                    "confetti";


                const size =
                    Math.random() * 6 + 5;


                piece.style.width =
                    size + "px";


                piece.style.height =
                    size * 1.5 + "px";


                piece.style.left =
                    Math.random() * 100 + "%";


                piece.style.background =
                    colors[
                        Math.floor(
                            Math.random() *
                            colors.length
                        )
                    ];


                piece.style.animationDuration =
                    (
                        Math.random() * 3 +
                        3
                    ) + "s";


                piece.style.animationDelay =
                    (
                        Math.random() * 0.8
                    ) + "s";


                confetti.appendChild(
                    piece
                );


                setTimeout(
                    () => {

                        piece.remove();

                    },
                    7000
                );

            }

        }


        /* =================================
           INITIAL STATE
        ================================= */

        updateNavigation();

    }
);