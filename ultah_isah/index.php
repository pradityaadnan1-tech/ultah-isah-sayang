<?php
$nama = "Aisyah";

$ucapan = "Selamat Ulang Tahun, Sayang";

$kataKata = "Hari ini bukan hanya tentang bertambahnya usia,
tetapi tentang bertambahnya cerita, tawa,
dan kenangan indah yang telah kita lewati bersama.

Semoga setiap senyum yang kamu berikan kepada dunia
selalu kembali kepadamu dengan cara yang lebih indah.";

$doa = "Semoga di usia yang baru ini, setiap langkahmu
selalu dimudahkan.
Semoga kesehatan, kebahagiaan,dan ketenangan selalu menyertaimu.
Semoga semua impian yang kamu simpan perlahan menemukan jalannya
untuk menjadi nyata.
dan satu lagi, semoga hubungan kita selalu indah dan semoga tetap menjadi 
kesayanganku yang lucu dan setia.";

$pesanAkhir = "Terima kasih telah menjadi bagian
dari cerita indah ini. ♡";
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Untuk <?= htmlspecialchars($nama) ?> ♡
    </title>

    <style>
        /* =========================================================
   RESET
========================================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family:
                Georgia,
                "Times New Roman",
                serif;

            background: #130b0f;
            color: white;
        }


        /* =========================================================
   BACKGROUND VIDEO
========================================================= */

        #background-video {

            position: fixed;

            inset: 0;

            width: 100%;
            height: 100%;

            object-fit: cover;

            z-index: -10;

            filter:
                brightness(.55) saturate(.9);
        }

        .video-overlay {

            position: fixed;

            inset: 0;

            background:
                radial-gradient(circle at center,
                    rgba(0, 0, 0, .04),
                    rgba(0, 0, 0, .48));

            z-index: -9;

            pointer-events: none;
        }

        .video-vignette {

            position: fixed;

            inset: 0;

            background:
                radial-gradient(ellipse at center,
                    transparent 28%,
                    rgba(0, 0, 0, .68));

            z-index: -8;

            pointer-events: none;
        }


        /* =========================================================
   APP
========================================================= */

        #app {

            position: relative;

            width: 100%;
            height: 100%;

            display: flex;

            align-items: center;
            justify-content: center;
        }


        /* =========================================================
   BOOK STAGE
========================================================= */

        .book-stage {

            position: absolute;

            left: 50%;
            top: 50%;

            width: min(900px, 94vw);
            height: min(650px, 88vh);

            transform:
                translate(-50%, -50%);

            display: flex;

            align-items: center;
            justify-content: center;

            perspective: 2200px;

            transition:
                opacity .7s ease,
                transform .8s ease;
        }


        /* =========================================================
   BOOK
========================================================= */

        .book {

            position: relative;

            width: 390px;

            height:
                min(510px, 72vh);

            min-height: 360px;

            transform-style: preserve-3d;

            transition:
                width 1.25s cubic-bezier(.2, .8, .25, 1);

            filter:
                drop-shadow(0 25px 30px rgba(0, 0, 0, .45));
        }

        .book.open {

            width:
                min(820px, 88vw);
        }


        /* =========================================================
   COVER
========================================================= */

        .book-cover {

            position: absolute;

            left: 0;
            top: 0;

            width: 100%;
            height: 100%;

            z-index: 100;

            transform-origin:
                left center;

            transform-style: preserve-3d;

            cursor: pointer;

            transition:
                width 1.25s cubic-bezier(.2, .8, .25, 1),
                transform 1.45s cubic-bezier(.16, .78, .2, 1);
        }


        /* Buku tertutup */

        .book:not(.open) .book-cover {

            width: 100%;

            transform:
                rotateY(0deg) translateZ(30px);
        }


        /* Buku terbuka */

        .book.open .book-cover {

            width: 50%;

            transform:
                rotateY(-180deg) translateZ(0);

            cursor: default;
        }


        /* =========================================================
   COVER DEPAN
========================================================= */

        .cover-front {

            position: absolute;

            inset: 0;

            display: flex;

            align-items: center;
            justify-content: center;

            overflow: hidden;

            background:
                linear-gradient(135deg,
                    rgba(255, 255, 255, .14),
                    transparent 28%),
                linear-gradient(145deg,
                    #704650,
                    #42262f 60%,
                    #29171e);

            border:
                1px solid rgba(255, 255, 255, .16);

            border-radius:
                5px 14px 14px 5px;

            backface-visibility: hidden;

            box-shadow:
                inset 8px 0 15px rgba(0, 0, 0, .25),
                inset -4px 0 10px rgba(255, 255, 255, .08);
        }

        .cover-front::before {

            content: "";

            position: absolute;

            inset: 22px;

            border:
                1px solid rgba(255, 225, 230, .32);

            border-radius: 5px;
        }

        .cover-front::after {

            content: "♡";

            position: absolute;

            left: 50%;
            top: 50%;

            transform:
                translate(-50%, -50%);

            font-size: 95px;

            color:
                rgba(255, 225, 230, .13);
        }


        /* =========================================================
   COVER CONTENT
========================================================= */

        .cover-content {

            position: relative;

            z-index: 5;

            text-align: center;

            padding: 35px;
        }

        .cover-small {

            margin-bottom: 20px;

            font-family: Arial, sans-serif;

            font-size: 11px;

            letter-spacing: 4px;

            text-transform: uppercase;

            color:
                rgba(255, 240, 242, .7);
        }

        .cover-title {

            margin-bottom: 24px;

            font-size:
                clamp(28px, 4vw, 44px);

            line-height: 1.25;

            color: #fff8f9;

            text-shadow:
                0 4px 15px rgba(0, 0, 0, .35);
        }

        .cover-heart {

            font-size: 34px;

            animation:
                heartbeat 1.8s ease-in-out infinite;
        }

        .cover-hint {

            margin-top: 28px;

            font-family: Arial, sans-serif;

            font-size: 10px;

            letter-spacing: 2px;

            text-transform: uppercase;

            color:
                rgba(255, 255, 255, .55);
        }


        /* =========================================================
   COVER BELAKANG
========================================================= */

        .cover-back {

            position: absolute;

            inset: 0;

            background:
                linear-gradient(135deg,
                    #ead9d4,
                    #d7bdb8);

            border-radius:
                5px 10px 10px 5px;

            transform:
                rotateY(180deg);

            backface-visibility: hidden;
        }


        /* =========================================================
   BUNGA DEKORASI COVER
========================================================= */

        .book-flower {

            position: absolute;

            width: 75px;
            height: 95px;

            z-index: 120;

            pointer-events: none;

            opacity: .9;

            transform-origin:
                bottom center;

            transition:
                opacity .7s ease,
                transform .8s ease;
        }


        /* Bunga kanan atas */

        .book-flower-top {

            right: -5px;
            top: -5px;

            transform:
                rotate(25deg);
        }


        /* Bunga kiri bawah */

        .book-flower-bottom {

            left: -5px;
            bottom: -5px;

            transform:
                rotate(-155deg);
        }


        /* =========================================================
   BATANG BUNGA COVER
========================================================= */

        .book-flower-stem {

            position: absolute;

            left: 37px;
            bottom: 0;

            width: 2px;
            height: 70px;

            border-radius: 100%;

            background:
                rgba(91, 118, 75, .7);

            transform:
                rotate(-8deg);

            transform-origin:
                bottom center;
        }


        /* =========================================================
   DAUN BUNGA COVER
========================================================= */

        .book-flower-stem::before,
        .book-flower-stem::after {

            content: "";

            position: absolute;

            width: 25px;
            height: 11px;

            border-radius:
                100% 0 100% 0;

            background:
                rgba(101, 132, 79, .68);
        }

        .book-flower-stem::before {

            left: -21px;
            top: 35px;

            transform:
                rotate(-25deg);
        }

        .book-flower-stem::after {

            left: 0;
            top: 19px;

            transform:
                rotate(25deg) scaleX(-1);
        }


        /* =========================================================
   KEPALA BUNGA COVER
========================================================= */

        .book-flower-head {

            position: absolute;

            left: 17px;
            top: 4px;

            width: 43px;
            height: 43px;
        }


        /* Kelopak */

        .book-flower-head span {

            position: absolute;

            width: 20px;
            height: 27px;

            border-radius:
                50% 50% 45% 45%;

            background:
                radial-gradient(circle at 50% 75%,
                    rgba(255, 255, 255, .75),
                    rgba(220, 155, 165, .85));

            transform-origin:
                50% 80%;
        }

        .book-flower-head span:nth-child(1) {

            left: 11px;
            top: 0;
        }

        .book-flower-head span:nth-child(2) {

            left: 0;
            top: 9px;

            transform:
                rotate(-65deg);
        }

        .book-flower-head span:nth-child(3) {

            right: 0;
            top: 9px;

            transform:
                rotate(65deg);
        }

        .book-flower-head span:nth-child(4) {

            left: 11px;
            top: 17px;

            transform:
                rotate(180deg);
        }


        /* Tengah bunga */

        .book-flower-head i {

            position: absolute;

            left: 15px;
            top: 15px;

            width: 13px;
            height: 13px;

            border-radius: 50%;

            background:
                #d5aa60;

            box-shadow:
                0 0 7px rgba(210, 165, 90, .45);
        }


        /* Saat buku terbuka */

        .book.open .book-flower {

            opacity: .55;
        }


        /* =========================================================
   AREA ISI BUKU
========================================================= */

        .book-content {

            position: absolute;

            inset: 0;

            z-index: 10;

            overflow: hidden;

            border-radius: 7px;

            background:
                linear-gradient(90deg,
                    rgba(110, 65, 55, .06),
                    transparent 12%,
                    transparent 88%,
                    rgba(110, 65, 55, .06)),
                #f6e9df;

            opacity: 0;

            visibility: hidden;

            transform:
                scale(.96);

            transition:
                opacity .55s ease .75s,
                transform .7s ease .75s,
                visibility 0s linear 1.2s;

            box-shadow:
                inset 0 0 35px rgba(90, 50, 40, .1);
        }

        .book.open .book-content {

            opacity: 1;

            visibility: visible;

            transform:
                scale(1);

            transition:
                opacity .55s ease .75s,
                transform .7s ease .75s,
                visibility 0s linear 0s;
        }


        /* =========================================================
   HALAMAN
========================================================= */

        .page {

            position: absolute;

            inset: 0;

            width: 100%;
            height: 100%;

            padding:
                clamp(42px, 8vh, 75px) clamp(30px, 8vw, 100px);

            display: flex;

            align-items: center;
            justify-content: center;

            text-align: center;

            opacity: 0;

            visibility: hidden;

            transform:
                translateX(30px) scale(.985);

            transition:
                opacity .45s ease,
                transform .6s cubic-bezier(.2, .8, .2, 1),
                visibility 0s linear .6s;

            pointer-events: none;
        }

        .page.active {

            opacity: 1;

            visibility: visible;

            transform:
                translateX(0) scale(1);

            transition:
                opacity .5s ease,
                transform .6s cubic-bezier(.2, .8, .2, 1),
                visibility 0s linear 0s;

            pointer-events: auto;
        }


        /* =========================================================
   PAGE INNER
========================================================= */

        .page-inner {

            position: relative;

            width: min(100%, 650px);

            max-height: 100%;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;
        }


        /* =========================================================
   NOMOR HALAMAN
========================================================= */

        .page-number {

            position: absolute;

            top: -28px;

            left: 50%;

            transform:
                translateX(-50%);

            font-family: Arial, sans-serif;

            font-size: 9px;

            letter-spacing: 3px;

            color:
                rgba(80, 50, 50, .28);
        }


        /* =========================================================
   SIMBOL
========================================================= */

        .page-symbol {

            flex-shrink: 0;

            margin-bottom:
                clamp(10px, 2.5vh, 20px);

            font-size:
                clamp(20px, 3vw, 27px);

            color: #a86b74;
        }


        /* =========================================================
   JUDUL
========================================================= */

        .page-title {

            flex-shrink: 0;

            width: 100%;

            margin-bottom:
                clamp(14px, 3vh, 27px);

            font-size:
                clamp(25px, 4vw, 42px);

            line-height: 1.25;

            font-weight: normal;

            color: #673f46;

            text-shadow:
                0 1px 1px rgba(0, 0, 0, .04);
        }


        /* =========================================================
   GARIS
========================================================= */

        .page-line {

            flex-shrink: 0;

            width:
                clamp(55px, 8vw, 75px);

            height: 1px;

            margin:
                0 auto clamp(16px, 3vh, 28px);

            background:
                rgba(145, 90, 95, .35);
        }


        /* =========================================================
   TEXT
========================================================= */

        .page-text {

            width:
                min(100%, 590px);

            font-size:
                clamp(13px, 1.45vw, 17px);

            line-height:
                clamp(1.65, 2vh, 2);

            color: #604748;

            white-space: pre-line;

            overflow-wrap: break-word;

            word-break: normal;
        }


        /* =========================================================
   SLIDE 1
========================================================= */

        .page[data-page="1"] .page-text {

            max-width: 570px;

            font-size:
                clamp(14px, 1.55vw, 18px);

            line-height:
                clamp(1.7, 2.1vh, 2.05);
        }


        /* =========================================================
   SLIDE 2
========================================================= */

        .page[data-page="2"] .page-text {

            max-width: 590px;

            font-size:
                clamp(13px, 1.45vw, 17px);

            line-height:
                clamp(1.65, 2vh, 1.95);
        }


        /* =========================================================
   SLIDE 3
========================================================= */

        .page[data-page="3"] .page-inner {

            transform:
                translateY(10px);
        }

        .page[data-page="3"] .page-title {

            margin-bottom: 12px;
        }

        .page[data-page="3"] .page-line {

            margin-bottom: 15px;
        }

        .page[data-page="3"] .page-text {

            max-width: 560px;

            font-size:
                clamp(12.5px, 1.35vw, 16px);

            line-height:
                clamp(1.55, 1.9vh, 1.85);
        }


        /* =========================================================
   DEKORASI HALAMAN
========================================================= */

        .page-corner {

            position: absolute;

            width: 110px;
            height: 110px;

            border:
                1px solid rgba(145, 90, 95, .15);

            border-radius: 50%;

            pointer-events: none;
        }

        .page-corner.top-left {

            left: -60px;
            top: -60px;
        }

        .page-corner.bottom-right {

            right: -60px;
            bottom: -60px;
        }


        /* =========================================================
   NAVIGATION
========================================================= */

        .book-navigation {

            position: absolute;

            left: 50%;

            bottom: -42px;

            transform:
                translateX(-50%);

            z-index: 300;

            display: flex;

            align-items: center;

            opacity: 0;

            pointer-events: none;

            transition:
                opacity .5s ease;
        }

        .book-navigation.show {

            opacity: 1;

            pointer-events: auto;
        }

        .nav-button {

            padding:
                8px 19px;

            border:
                1px solid rgba(255, 255, 255, .3);

            border-radius: 30px;

            background:
                rgba(15, 8, 12, .42);

            backdrop-filter:
                blur(10px);

            color:
                rgba(255, 255, 255, .92);

            font-family: Arial, sans-serif;

            font-size: 11px;

            cursor: pointer;

            transition:
                background .25s ease,
                transform .25s ease;
        }

        .nav-button:hover {

            background:
                rgba(15, 8, 12, .7);

            transform:
                translateY(-2px);
        }


        /* =========================================================
   MUSIC BUTTON
========================================================= */

        .music-button {

            position: fixed;

            top: 22px;
            right: 22px;

            z-index: 2000;

            width: 42px;
            height: 42px;

            display: flex;

            align-items: center;
            justify-content: center;

            border:
                1px solid rgba(255, 255, 255, .28);

            border-radius: 50%;

            background:
                rgba(15, 8, 12, .42);

            backdrop-filter:
                blur(10px);

            color: white;

            font-size: 17px;

            cursor: pointer;

            opacity: 0;

            transform:
                scale(.8);

            pointer-events: none;

            transition:
                opacity .5s ease,
                transform .4s ease,
                background .25s ease;
        }

        .music-button.show {

            opacity: 1;

            transform:
                scale(1);

            pointer-events: auto;
        }

        .music-button:hover {

            background:
                rgba(15, 8, 12, .7);

            transform:
                scale(1.06);
        }

        .music-button.playing {

            animation:
                musicPulse 1.5s ease-in-out infinite;
        }

        @keyframes musicPulse {

            0%,
            100% {
                box-shadow:
                    0 0 0 rgba(255, 255, 255, 0);
            }

            50% {
                box-shadow:
                    0 0 18px rgba(255, 220, 225, .28);
            }
        }


        /* =========================================================
   GALLERY
========================================================= */

        .gallery {

            position: fixed;

            inset: 0;

            z-index: 500;

            display: flex;

            align-items: center;
            justify-content: center;

            opacity: 0;

            visibility: hidden;

            transition:
                opacity .8s ease,
                visibility 0s linear .8s;
        }

        .gallery.active {

            opacity: 1;

            visibility: visible;

            transition:
                opacity .8s ease,
                visibility 0s linear 0s;
        }


        /* =========================================================
   FALLING BOOK
========================================================= */

        .falling-book {

            position: absolute;

            left: 50%;
            top: 50%;

            width: 170px;
            height: 225px;

            transform:
                translate(-50%, -50%);

            z-index: 600;

            transition:
                transform 1.2s cubic-bezier(.2, .8, .2, 1),
                opacity .6s ease .5s;
        }

        .gallery.active .falling-book {

            transform:
                translate(-50%, 150vh) rotate(40deg);

            opacity: 0;
        }

        .falling-cover {

            position: absolute;

            inset: 0;

            border-radius: 6px;

            background:
                linear-gradient(145deg,
                    #704650,
                    #29171e);

            box-shadow:
                0 20px 35px rgba(0, 0, 0, .5);
        }

        .falling-cover::after {

            content: "♡";

            position: absolute;

            left: 50%;
            top: 50%;

            transform:
                translate(-50%, -50%);

            font-size: 55px;

            color:
                rgba(255, 255, 255, .3);
        }


        /* =========================================================
   FOTO CONTAINER
========================================================= */

        .photos-container {

            position: relative;

            width:
                min(960px, 95vw);

            height:
                min(620px, 85vh);

            opacity: 0;

            transform:
                scale(.9);

            transition:
                opacity .9s ease 1s,
                transform 1s ease 1s;
        }

        .gallery.active .photos-container {

            opacity: 1;

            transform:
                scale(1);
        }


        /* =========================================================
   FOTO
========================================================= */

        .photo {

            position: absolute;

            width:
                clamp(125px, 17vw, 185px);

            aspect-ratio:
                3 / 4;

            padding: 8px;

            background:
                #faf3ed;

            box-shadow:
                0 15px 30px rgba(0, 0, 0, .4);

            cursor: pointer;

            overflow: hidden;

            transition:
                transform .65s cubic-bezier(.2, .8, .2, 1),
                opacity .5s ease,
                filter .5s ease,
                width .65s ease;
        }

        .photo img {

            display: block;

            width: 100%;
            height: 100%;

            object-fit: cover;
        }


        /* =========================================================
   POSISI FOTO
========================================================= */

        .photo:nth-child(1) {

            left: 6%;
            top: 13%;

            transform:
                rotate(-9deg);
        }

        .photo:nth-child(2) {

            left: 29%;
            top: 4%;

            transform:
                rotate(5deg);
        }

        .photo:nth-child(3) {

            right: 29%;
            top: 8%;

            transform:
                rotate(-4deg);
        }

        .photo:nth-child(4) {

            right: 6%;
            top: 17%;

            transform:
                rotate(8deg);
        }

        .photo:nth-child(5) {

            left: 50%;
            bottom: 3%;

            transform:
                translateX(-50%) rotate(-2deg);
        }


        /* =========================================================
   FOTO HOVER
========================================================= */

        .photo:hover {

            transform:
                translateY(-8px) rotate(0deg) scale(1.04);

            z-index: 30;
        }


        /* =========================================================
   FOTO SELECTED
========================================================= */

        .photo.selected {

            left: 50% !important;
            top: 50% !important;

            right: auto !important;
            bottom: auto !important;

            width:
                min(360px, 62vw);

            transform:
                translate(-50%, -50%) rotate(0deg) scale(1.08);

            z-index: 100;

            box-shadow:
                0 30px 60px rgba(0, 0, 0, .55);
        }


        /* =========================================================
   FOTO DIMMED
========================================================= */

        .photo.dimmed {

            opacity: .3;

            filter:
                brightness(.6) blur(1px);

            transform:
                scale(.88);
        }


        /* =========================================================
   GALLERY BACK
========================================================= */

        #gallery-back {

            position: absolute;

            left: 50%;
            bottom: 24px;

            transform:
                translateX(-50%);

            z-index: 800;

            padding:
                10px 20px;

            border:
                1px solid rgba(255, 255, 255, .3);

            border-radius: 30px;

            background:
                rgba(15, 8, 12, .45);

            backdrop-filter:
                blur(10px);

            color: white;

            font-family: Arial, sans-serif;

            font-size: 12px;

            cursor: pointer;

            transition:
                background .25s ease,
                transform .25s ease;
        }

        #gallery-back:hover {

            background:
                rgba(15, 8, 12, .7);

            transform:
                translateX(-50%) translateY(-2px);
        }


        /* =========================================================
   FLOWERS GALLERY
========================================================= */

        .flower {

            position: absolute;

            width: 100px;
            height: 160px;

            z-index: 30;

            pointer-events: none;

            transform-origin:
                bottom center;

            animation:
                flower-sway 5s ease-in-out infinite;
        }

        .flower-left {

            left: 1%;
            bottom: 1%;
        }

        .flower-right {

            right: 1%;
            bottom: 1%;

            transform:
                scaleX(-1);

            animation-delay:
                -2.2s;
        }


        /* =========================================================
   BATANG GALLERY
========================================================= */

        .flower-stem {

            position: absolute;

            left: 47px;
            bottom: 0;

            width: 3px;
            height: 110px;

            border-radius: 100%;

            background:
                rgba(88, 120, 72, .8);

            transform:
                rotate(-8deg);

            transform-origin:
                bottom center;
        }


        /* =========================================================
   DAUN GALLERY
========================================================= */

        .flower-leaf {

            position: absolute;

            width: 35px;
            height: 16px;

            background:
                rgba(100, 135, 78, .75);

            border-radius:
                100% 0 100% 0;
        }

        .flower-leaf.one {

            left: 18px;
            bottom: 37px;

            transform:
                rotate(25deg);
        }

        .flower-leaf.two {

            left: 44px;
            bottom: 64px;

            transform:
                rotate(-25deg) scaleX(-1);
        }


        /* =========================================================
   KEPALA BUNGA GALLERY
========================================================= */

        .flower-head {

            position: absolute;

            left: 25px;
            top: 12px;

            width: 48px;
            height: 48px;
        }


        /* =========================================================
   KELOPAK GALLERY
========================================================= */

        .petal {

            position: absolute;

            width: 23px;
            height: 30px;

            border-radius:
                50% 50% 45% 45%;

            background:
                radial-gradient(circle at 50% 75%,
                    rgba(255, 255, 255, .7),
                    rgba(220, 155, 165, .8));

            transform-origin:
                50% 80%;
        }

        .petal:nth-child(1) {

            left: 12px;
            top: 0;
        }

        .petal:nth-child(2) {

            left: 0;
            top: 10px;

            transform:
                rotate(-65deg);
        }

        .petal:nth-child(3) {

            right: 0;
            top: 10px;

            transform:
                rotate(65deg);
        }

        .petal:nth-child(4) {

            left: 12px;
            top: 18px;

            transform:
                rotate(180deg);
        }

        .flower-center {

            position: absolute;

            left: 17px;
            top: 17px;

            width: 14px;
            height: 14px;

            border-radius: 50%;

            background: #d5aa60;

            box-shadow:
                0 0 10px rgba(210, 165, 90, .5);
        }


        /* =========================================================
   CONFETTI
========================================================= */

        .confetti {

            position: fixed;

            top: -20px;

            z-index: 1500;

            pointer-events: none;

            animation:
                confetti-fall linear forwards;
        }

        @keyframes confetti-fall {

            0% {

                transform:
                    translateY(0) rotate(0deg);

                opacity: 1;
            }

            100% {

                transform:
                    translateY(110vh) rotate(720deg);

                opacity: 0;
            }
        }


        /* =========================================================
   HEART
========================================================= */

        @keyframes heartbeat {

            0%,
            100% {

                transform:
                    scale(1);
            }

            50% {

                transform:
                    scale(1.18);
            }
        }


        /* =========================================================
   FLOWER SWAY
========================================================= */

        @keyframes flower-sway {

            0%,
            100% {

                rotate: -2deg;
            }

            50% {

                rotate: 3deg;
            }
        }


        /* =========================================================
   TABLET
========================================================= */

        @media (max-width: 900px) {

            .book {

                height:
                    min(500px, 70vh);
            }

            .book.open {

                width:
                    min(760px, 91vw);
            }

            .page {

                padding:
                    45px 55px;
            }

            .page-text {

                max-width: 540px;
            }
        }


        /* =========================================================
   HP
========================================================= */

        @media (max-width: 700px) {

            .book-stage {

                width: 96vw;

                height: 76vh;
            }


            .book {

                height:
                    min(450px, 65vh);

                min-height: 340px;
            }


            .book.open {

                width: 94vw;
            }


            .page {

                padding:
                    42px 28px;
            }


            .page-inner {

                width: 100%;
            }


            .page-symbol {

                margin-bottom: 10px;

                font-size: 21px;
            }


            .page-title {

                margin-bottom: 14px;

                font-size: 25px;

                line-height: 1.25;
            }


            .page-line {

                margin-bottom: 16px;
            }


            .page-text {

                font-size: 13px;

                line-height: 1.65;

                max-width: 100%;
            }


            .page[data-page="1"] .page-text {

                font-size: 13.5px;

                line-height: 1.7;
            }


            .page[data-page="2"] .page-text {

                font-size: 12.8px;

                line-height: 1.6;
            }


            /* Slide 3 */

            .page[data-page="3"] .page-inner {

                transform:
                    translateY(6px);
            }


            .page[data-page="3"] .page-title {

                margin-bottom: 9px;
            }


            .page[data-page="3"] .page-line {

                margin-bottom: 11px;
            }


            .page[data-page="3"] .page-text {

                font-size: 12px;

                line-height: 1.55;
            }


            .page-number {

                top: -25px;
            }


            .book-navigation {

                bottom: -40px;
            }


            /* Bunga cover */

            .book-flower {

                width: 60px;
                height: 78px;

                opacity: .82;
            }

            .book-flower-top {

                right: -3px;
                top: -3px;
            }

            .book-flower-bottom {

                left: -3px;
                bottom: -3px;
            }

            .book-flower-head {

                transform:
                    scale(.82);

                transform-origin:
                    top left;
            }

            .book-flower-stem {

                height: 58px;
            }


            /* Foto */

            .photo {

                width: 115px;
            }


            .photo:nth-child(1) {

                left: 3%;
            }


            .photo:nth-child(2) {

                left: 26%;
            }


            .photo:nth-child(3) {

                right: 26%;
            }


            .photo:nth-child(4) {

                right: 3%;
            }


            .flower {

                transform:
                    scale(.72);
            }


            .flower-left {

                left: -15px;
            }


            .flower-right {

                right: -15px;
            }


            /* Music */

            .music-button {

                top: 15px;
                right: 15px;

                width: 38px;
                height: 38px;

                font-size: 15px;
            }

        }


        /* =========================================================
   HP PENDEK
========================================================= */

        @media (max-height: 700px) and (max-width: 700px) {

            .book {

                height:
                    min(400px, 61vh);
            }


            .page {

                padding:
                    28px 25px;
            }


            .page-symbol {

                margin-bottom: 7px;

                font-size: 18px;
            }


            .page-title {

                margin-bottom: 9px;

                font-size: 22px;
            }


            .page-line {

                margin-bottom: 10px;
            }


            .page-text {

                font-size: 11.5px;

                line-height: 1.45;
            }


            .page[data-page="1"] .page-text {

                font-size: 12px;

                line-height: 1.5;
            }


            .page[data-page="2"] .page-text {

                font-size: 11.5px;

                line-height: 1.45;
            }


            /* Slide 3 */

            .page[data-page="3"] .page-inner {

                transform:
                    translateY(3px);
            }


            .page[data-page="3"] .page-title {

                margin-bottom: 7px;
            }


            .page[data-page="3"] .page-line {

                margin-bottom: 8px;
            }


            .page[data-page="3"] .page-text {

                font-size: 10.8px;

                line-height: 1.4;
            }


            .page-number {

                top: -18px;
            }

        }


        /* =========================================================
   LAYAR SANGAT PENDEK
========================================================= */

        @media (max-height: 560px) {

            .book {

                height:
                    82vh;
            }


            .page {

                padding:
                    20px 30px;
            }


            .page-symbol {

                display: none;
            }


            .page-title {

                margin-bottom: 8px;

                font-size: 21px;
            }


            .page-line {

                margin-bottom: 10px;
            }


            .page-text {

                font-size: 11px;

                line-height: 1.35;
            }


            .page[data-page="3"] .page-inner {

                transform:
                    translateY(2px);
            }


            .page[data-page="3"] .page-text {

                font-size: 10px;

                line-height: 1.3;
            }

        }
    </style>

</head>


<body>


    <!-- =====================================================
     BACKGROUND VIDEO
===================================================== -->

    <video
        id="background-video"
        autoplay
        muted
        loop
        playsinline
        preload="auto">

        <source
            src="assets/video/romantic.mp4"
            type="video/mp4">

    </video>

    <div class="video-overlay"></div>

    <div class="video-vignette"></div>


    <!-- =====================================================
     MUSIK ROMANTIS
===================================================== -->

    <audio
        id="romanticMusic"
        loop
        preload="auto">

        <source
            src="assets/music/romantic.mp3"
            type="audio/mpeg">

    </audio>


    <!-- =====================================================
     TOMBOL MUSIC
===================================================== -->

    <button
        class="music-button"
        id="musicButton"
        aria-label="Kontrol musik"
        title="Musik">
        ♪
    </button>


    <!-- =====================================================
     APP
===================================================== -->

    <div id="app">


        <!-- =================================================
         BOOK STAGE
    ================================================== -->

        <div
            class="book-stage"
            id="bookStage">

            <div
                class="book"
                id="book">


                <!-- =========================================
                 COVER
            ========================================== -->

                <div
                    class="book-cover"
                    id="bookCover">

                    <div class="cover-front">

                        <div class="cover-content">

                            <div class="cover-small">
                                Sebuah cerita kecil
                            </div>

                            <div class="cover-title">

                                Untuk
                                <?= htmlspecialchars($nama) ?>

                            </div>

                            <div class="cover-heart">
                                ♡
                            </div>

                            <div class="cover-hint">
                                Klik untuk membuka
                            </div>

                        </div>

                    </div>


                    <div class="cover-back"></div>

                </div>


                <!-- =========================================
                 BUNGA COVER KANAN ATAS
            ========================================== -->

                <div
                    class="book-flower book-flower-top">

                    <div
                        class="book-flower-stem"></div>

                    <div
                        class="book-flower-head">

                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>

                        <i></i>

                    </div>

                </div>


                <!-- =========================================
                 BUNGA COVER KIRI BAWAH
            ========================================== -->

                <div
                    class="book-flower book-flower-bottom">

                    <div
                        class="book-flower-stem"></div>

                    <div
                        class="book-flower-head">

                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>

                        <i></i>

                    </div>

                </div>


                <!-- =========================================
                 ISI BUKU
            ========================================== -->

                <div
                    class="book-content"
                    id="bookContent">


                    <!-- =====================================
                     SLIDE 1
                ====================================== -->

                    <section
                        class="page active"
                        data-page="1">

                        <div class="page-inner">

                            <div
                                class="page-corner top-left"></div>

                            <div
                                class="page-corner bottom-right"></div>


                            <div class="page-number">
                                01
                            </div>


                            <div class="page-symbol">
                                ♡
                            </div>


                            <h1 class="page-title">

                                <?= htmlspecialchars($ucapan) ?>

                            </h1>


                            <div class="page-line"></div>


                            <div class="page-text">

                                Hari ini adalah hari yang spesial.

                                Bukan hanya karena hari ini kamu bertambah usia,
                                tetapi karena hari ini dunia pernah menghadirkan
                                seseorang yang begitu berarti.

                                Seseorang yang kemudian menjadi bagian
                                dari banyak cerita indah.

                            </div>

                        </div>

                    </section>


                    <!-- =====================================
                     SLIDE 2
                ====================================== -->

                    <section
                        class="page"
                        data-page="2">

                        <div class="page-inner">

                            <div
                                class="page-corner top-left"></div>

                            <div
                                class="page-corner bottom-right"></div>


                            <div class="page-number">
                                02
                            </div>


                            <div class="page-symbol">
                                ✦
                            </div>


                            <h1 class="page-title">
                                Untukmu
                            </h1>


                            <div class="page-line"></div>


                            <div class="page-text">

                                <?= nl2br(htmlspecialchars($kataKata)) ?>

                            </div>

                        </div>

                    </section>


                    <!-- =====================================
                     SLIDE 3
                ====================================== -->

                    <section
                        class="page"
                        data-page="3">

                        <div class="page-inner">

                            <div
                                class="page-corner top-left"></div>

                            <div
                                class="page-corner bottom-right"></div>


                            <div class="page-number">
                                03
                            </div>


                            <div class="page-symbol">
                                ♡
                            </div>


                            <h1 class="page-title">
                                Doa & Harapan
                            </h1>


                            <div class="page-line"></div>


                            <div class="page-text">

                                <?= nl2br(htmlspecialchars($doa)) ?>

                            </div>

                        </div>

                    </section>


                </div>

            </div>


            <!-- =============================================
             NAVIGATION
        ============================================== -->

            <div
                class="book-navigation"
                id="bookNavigation">

                <button
                    class="nav-button"
                    id="previousButton">
                    ← Kembali
                </button>

            </div>


        </div>


        <!-- =================================================
         GALLERY
    ================================================== -->

        <div
            class="gallery"
            id="gallery">


            <!-- Buku jatuh -->

            <div
                class="falling-book"
                id="fallingBook">

                <div class="falling-cover"></div>

            </div>


            <!-- =============================================
             FOTO
        ============================================== -->

            <div class="photos-container">


                <div class="photo">

                    <img
                        src="assets/images/foto1.jpg"
                        alt="Foto 1">

                </div>


                <div class="photo">

                    <img
                        src="assets/images/foto2.jpg"
                        alt="Foto 2">

                </div>


                <div class="photo">

                    <img
                        src="assets/images/foto3.jpg"
                        alt="Foto 3">

                </div>


                <div class="photo">

                    <img
                        src="assets/images/foto4.jpg"
                        alt="Foto 4">

                </div>


                <div class="photo">

                    <img
                        src="assets/images/foto5.jpg"
                        alt="Foto 5">

                </div>


            </div>


            <!-- =============================================
             BUNGA KIRI
        ============================================== -->

            <div class="flower flower-left">

                <div class="flower-stem"></div>

                <div class="flower-leaf one"></div>

                <div class="flower-leaf two"></div>

                <div class="flower-head">

                    <div class="petal"></div>
                    <div class="petal"></div>
                    <div class="petal"></div>
                    <div class="petal"></div>

                    <div class="flower-center"></div>

                </div>

            </div>


            <!-- =============================================
             BUNGA KANAN
        ============================================== -->

            <div class="flower flower-right">

                <div class="flower-stem"></div>

                <div class="flower-leaf one"></div>

                <div class="flower-leaf two"></div>

                <div class="flower-head">

                    <div class="petal"></div>
                    <div class="petal"></div>
                    <div class="petal"></div>
                    <div class="petal"></div>

                    <div class="flower-center"></div>

                </div>

            </div>


            <!-- =============================================
             GALLERY BACK
        ============================================== -->

            <button id="gallery-back">
                ↩ Kembali
            </button>


        </div>


    </div>


    <script>
        /* =====================================================
   STATE
===================================================== */

        let opened = false;

        let currentPage = 1;

        let animating = false;

        let galleryActive = false;


        /* =====================================================
           ELEMENT
        ===================================================== */

        const book =
            document.getElementById("book");

        const bookCover =
            document.getElementById("bookCover");

        const bookStage =
            document.getElementById("bookStage");

        const bookNavigation =
            document.getElementById("bookNavigation");

        const previousButton =
            document.getElementById("previousButton");

        const gallery =
            document.getElementById("gallery");

        const galleryBack =
            document.getElementById("gallery-back");

        const pages =
            document.querySelectorAll(".page");

        const photos =
            document.querySelectorAll(".photo");


        /* =====================================================
           MUSIC
        ===================================================== */

        const romanticMusic =
            document.getElementById(
                "romanticMusic"
            );

        const musicButton =
            document.getElementById(
                "musicButton"
            );


        /* Volume awal */

        romanticMusic.volume = 0.45;


        /* =====================================================
           UPDATE MUSIC BUTTON
        ===================================================== */

        function updateMusicButton() {

            if (
                !romanticMusic.paused
            ) {

                musicButton.classList.add(
                    "playing"
                );

                musicButton.textContent = "♫";

            } else {

                musicButton.classList.remove(
                    "playing"
                );

                musicButton.textContent = "♪";
            }

        }


        /* =====================================================
           TOGGLE MUSIC
        ===================================================== */

        musicButton.addEventListener(
            "click",
            function(event) {

                event.stopPropagation();


                if (
                    romanticMusic.paused
                ) {

                    romanticMusic.play().then(
                        () => {

                            updateMusicButton();

                        }
                    ).catch(
                        () => {}
                    );

                } else {

                    romanticMusic.pause();

                    updateMusicButton();

                }

            }
        );


        /* =====================================================
           BUKA COVER
        ===================================================== */

        bookCover.addEventListener(
            "click",
            function(event) {

                event.stopPropagation();

                if (animating || opened) {
                    return;
                }

                openBook();

            }
        );


        /* =====================================================
           OPEN BOOK
        ===================================================== */

        function openBook() {

            if (animating || opened) {
                return;
            }

            animating = true;

            opened = true;

            currentPage = 1;


            pages.forEach(
                (page, index) => {

                    page.classList.toggle(
                        "active",
                        index === 0
                    );

                }
            );


            book.classList.add("open");


            /* ================================================
               MULAI MUSIK
            ================================================= */

            romanticMusic.volume = 0.45;

            romanticMusic.play().then(
                () => {

                    updateMusicButton();

                }
            ).catch(
                () => {

                    updateMusicButton();

                }
            );


            /* Tampilkan tombol musik */

            setTimeout(
                () => {

                    musicButton.classList.add(
                        "show"
                    );

                },
                900
            );


            /* Confetti */

            createConfetti();


            setTimeout(() => {

                bookNavigation.classList.add(
                    "show"
                );

                animating = false;

            }, 1800);

        }


        /* =====================================================
           CLICK BOOK
        ===================================================== */

        book.addEventListener(
            "click",
            function(event) {

                if (!opened) {
                    return;
                }

                if (
                    event.target.closest(".nav-button") ||
                    event.target.closest(".book-cover") ||
                    event.target.closest(".book-flower")
                ) {
                    return;
                }

                if (animating) {
                    return;
                }


                if (currentPage < 3) {

                    nextPage();

                } else {

                    openGallery();

                }

            }
        );


        /* =====================================================
           NEXT PAGE
        ===================================================== */

        function nextPage() {

            if (animating) {
                return;
            }

            if (currentPage >= 3) {

                openGallery();

                return;
            }

            animating = true;


            const oldPage =
                pages[currentPage - 1];

            const newPage =
                pages[currentPage];


            oldPage.classList.remove(
                "active"
            );

            newPage.classList.add(
                "active"
            );


            currentPage++;


            setTimeout(() => {

                animating = false;

            }, 650);

        }


        /* =====================================================
           PREVIOUS
        ===================================================== */

        previousButton.addEventListener(
            "click",
            function(event) {

                event.stopPropagation();

                if (animating) {
                    return;
                }


                if (currentPage === 1) {

                    closeBook();

                    return;
                }


                animating = true;


                const oldPage =
                    pages[currentPage - 1];

                const previousPage =
                    pages[currentPage - 2];


                oldPage.classList.remove(
                    "active"
                );

                previousPage.classList.add(
                    "active"
                );


                currentPage--;


                setTimeout(() => {

                    animating = false;

                }, 650);

            }
        );


        /* =====================================================
           CLOSE BOOK
        ===================================================== */

        function closeBook() {

            if (animating) {
                return;
            }

            animating = true;


            bookNavigation.classList.remove(
                "show"
            );


            pages.forEach(
                (page, index) => {

                    page.classList.toggle(
                        "active",
                        index === 0
                    );

                }
            );


            currentPage = 1;


            setTimeout(() => {

                book.classList.remove(
                    "open"
                );

            }, 250);


            setTimeout(() => {

                opened = false;

                animating = false;

            }, 1800);

        }


        /* =====================================================
           OPEN GALLERY
        ===================================================== */

        function openGallery() {

            if (
                animating ||
                galleryActive
            ) {
                return;
            }

            animating = true;

            galleryActive = true;


            bookNavigation.classList.remove(
                "show"
            );


            bookStage.style.opacity = "0";

            bookStage.style.transform =
                "translate(-50%, -50%) scale(.9) translateY(-20px)";


            setTimeout(() => {

                bookStage.style.display =
                    "none";

                gallery.classList.add(
                    "active"
                );

            }, 700);


            setTimeout(() => {

                animating = false;

            }, 1900);

        }


        /* =====================================================
           GALLERY BACK
        ===================================================== */

        galleryBack.addEventListener(
            "click",
            function(event) {

                event.stopPropagation();

                if (animating) {
                    return;
                }

                animating = true;


                photos.forEach(
                    photo => {

                        photo.classList.remove(
                            "selected"
                        );

                        photo.classList.remove(
                            "dimmed"
                        );

                    }
                );


                gallery.classList.remove(
                    "active"
                );


                setTimeout(() => {

                    galleryActive = false;


                    bookStage.style.display =
                        "flex";


                    currentPage = 3;


                    pages.forEach(
                        (page, index) => {

                            page.classList.toggle(
                                "active",
                                index === 2
                            );

                        }
                    );


                    opened = true;

                    book.classList.add(
                        "open"
                    );


                    bookStage.style.opacity = "0";

                    bookStage.style.transform =
                        "translate(-50%, -50%) scale(.9)";


                    requestAnimationFrame(() => {

                        requestAnimationFrame(() => {

                            bookStage.style.opacity =
                                "1";

                            bookStage.style.transform =
                                "translate(-50%, -50%) scale(1)";

                        });

                    });

                }, 850);


                setTimeout(() => {

                    bookNavigation.classList.add(
                        "show"
                    );

                    animating = false;

                }, 1800);

            }
        );


        /* =====================================================
           FOTO
        ===================================================== */

        photos.forEach(
            photo => {

                photo.addEventListener(
                    "click",
                    function(event) {

                        event.stopPropagation();


                        if (animating) {
                            return;
                        }


                        if (
                            this.classList.contains(
                                "selected"
                            )
                        ) {

                            photos.forEach(
                                item => {

                                    item.classList.remove(
                                        "selected"
                                    );

                                    item.classList.remove(
                                        "dimmed"
                                    );

                                }
                            );

                            return;
                        }


                        photos.forEach(
                            item => {

                                item.classList.remove(
                                    "selected"
                                );

                                item.classList.remove(
                                    "dimmed"
                                );

                            }
                        );


                        this.classList.add(
                            "selected"
                        );


                        photos.forEach(
                            item => {

                                if (item !== this) {

                                    item.classList.add(
                                        "dimmed"
                                    );

                                }

                            }
                        );

                    }
                );

            }
        );


        /* =====================================================
           CONFETTI
        ===================================================== */

        function createConfetti() {

            const symbols = [
                "♡",
                "♥",
                "✦",
                "✧",
                "•"
            ];

            const total = 55;


            for (
                let i = 0; i < total; i++
            ) {

                const item =
                    document.createElement(
                        "div"
                    );

                item.className =
                    "confetti";


                item.textContent =
                    symbols[
                        Math.floor(
                            Math.random() *
                            symbols.length
                        )
                    ];


                item.style.left =
                    Math.random() * 100 +
                    "vw";


                item.style.fontSize =
                    10 +
                    Math.random() * 15 +
                    "px";


                item.style.animationDuration =
                    3 +
                    Math.random() * 4 +
                    "s";


                item.style.animationDelay =
                    Math.random() * .8 +
                    "s";


                item.style.opacity =
                    .4 +
                    Math.random() * .6;


                document.body.appendChild(
                    item
                );


                setTimeout(
                    () => {

                        item.remove();

                    },
                    8000
                );

            }

        }


        /* =====================================================
           VIDEO
        ===================================================== */

        const video =
            document.getElementById(
                "background-video"
            );

        video.play().catch(
            () => {}
        );


        /* =====================================================
           DOUBLE CLICK
        ===================================================== */

        document.addEventListener(
            "dblclick",
            function(event) {

                event.preventDefault();

            }
        );
    </script>

</body>

</html>