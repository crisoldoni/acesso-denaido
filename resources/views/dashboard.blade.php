@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('header')
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
        {{ 'Bem Vindo - ' . Auth::user()->name }}
    </h2>
@endsection


@section('content')  

<div class="overflow-hidden flex justify-center items-center">
    <svg 
        xmlns="http://www.w3.org/2000/svg" 
        xml:space="preserve" 
        width="100%" 
        height="auto" 
        version="1.0" 
        style="max-width: 100%; height: auto; display: block;"
        viewBox="0 0 1333 750" 
        preserveAspectRatio="xMidYMid meet">
                <defs>
                <font id="FontID1" horiz-adv-x="578" font-variant="normal" style="fill-rule:nonzero" font-style="italic" font-weight="400">
                    <font-face 
                        font-family="Calibri">
                        <font-face-src>
                            <font-face-name name="Calibri Italic"/>
                        </font-face-src>
                    </font-face>
                <missing-glyph><path d="M0 0z"/></missing-glyph>
                <glyph unicode="A" horiz-adv-x="578" d="M518 30c1,-7 1,-13 1,-17 0,-4 -2,-8 -5,-10 -3,-2 -8,-4 -14,-4 -7,-1 -15,-1 -26,-1 -7,0 -13,0 -19,1 -5,1 -9,1 -12,3 -3,1 -5,3 -6,5 -1,2 -2,4 -3,7l-23 154 -264 0 -82 -152c-1,-3 -3,-6 -6,-8 -2,-2 -5,-4 -9,-5 -4,-1 -9,-2 -15,-3 -6,0 -14,-1 -23,-1 -10,0 -17,0 -23,1 -6,1 -10,2 -12,5 -2,2 -3,6 -2,10 1,5 3,10 7,17l329 587c2,4 5,7 7,9 3,2 6,4 10,5 4,1 9,2 16,3 6,0 14,1 24,1 11,0 19,0 26,-1 7,0 12,-2 16,-3 4,-1 7,-3 9,-5 1,-3 3,-5 3,-9l95 -587zm-165 518l0 0 -170 -315 218 0 -47 315z"/>
                <glyph unicode="E" horiz-adv-x="488" d="M506 616c0,-2 0,-4 0,-8 0,-4 -1,-7 -1,-11 -1,-4 -2,-8 -3,-12 -1,-4 -3,-8 -5,-12 -2,-3 -4,-6 -7,-8 -3,-2 -6,-3 -9,-3l-246 0 -40 -198 212 0c4,0 7,-1 9,-4 2,-3 3,-7 3,-12 0,-2 0,-4 -1,-7 0,-4 -1,-7 -2,-11 0,-4 -1,-8 -3,-12 -1,-4 -3,-7 -5,-10 -2,-3 -4,-6 -7,-8 -3,-2 -6,-3 -9,-3l-212 0 -46 -226 252 0c3,0 6,-1 8,-4 2,-3 3,-7 3,-12 0,-2 0,-5 0,-8 0,-4 -1,-7 -2,-11 -1,-4 -2,-8 -3,-12 -1,-4 -3,-8 -5,-11 -2,-3 -4,-6 -7,-8 -3,-2 -6,-3 -9,-3l-304 0c-4,0 -7,0 -10,2 -4,1 -6,3 -9,6 -3,3 -4,6 -5,11 -1,4 -1,10 1,16l113 564c2,13 7,21 15,27 8,5 16,7 23,7l299 0c8,0 11,-5 11,-16z"/>
                <glyph unicode="G" horiz-adv-x="630" d="M625 563c0,-2 -1,-5 -1,-8 0,-4 -1,-7 -2,-11 -1,-4 -2,-8 -3,-12 -1,-4 -3,-8 -4,-11 -2,-3 -3,-6 -5,-8 -2,-2 -4,-3 -6,-3 -5,0 -12,3 -20,9 -8,6 -19,13 -33,20 -14,7 -31,14 -51,20 -20,6 -44,9 -71,9 -29,0 -56,-4 -81,-13 -25,-8 -48,-20 -69,-36 -21,-15 -40,-33 -57,-54 -17,-21 -31,-43 -42,-67 -12,-24 -20,-50 -26,-77 -6,-27 -9,-54 -9,-81 0,-29 4,-54 13,-76 8,-22 20,-41 36,-55 16,-15 35,-26 57,-34 22,-8 47,-12 74,-12 20,0 41,2 63,7 22,5 42,12 61,22l37 183 -146 0c-4,0 -7,1 -9,4 -2,3 -3,7 -3,12 0,2 0,5 1,9 0,4 1,8 2,12 1,4 2,8 3,12 2,4 3,7 5,11 2,3 4,5 6,7 3,2 5,3 8,3l201 0c9,0 16,-3 20,-9 4,-6 5,-15 3,-25l-49 -243c-1,-6 -3,-11 -5,-15 -2,-4 -5,-7 -7,-10 -3,-3 -10,-7 -22,-13 -12,-6 -27,-12 -45,-17 -18,-6 -39,-11 -61,-15 -23,-5 -46,-7 -71,-7 -42,0 -80,5 -112,16 -32,11 -59,27 -81,48 -22,21 -38,46 -50,76 -11,30 -17,63 -17,101 0,35 4,69 12,103 8,34 19,66 34,96 15,30 34,58 56,84 22,26 47,48 75,66 29,19 60,33 94,44 34,11 71,16 111,16 23,0 44,-2 64,-6 20,-4 38,-9 53,-15 16,-6 29,-12 40,-19 11,-7 18,-12 22,-16 4,-4 6,-7 8,-10 1,-3 2,-8 2,-12z"/>
                <glyph unicode="I" horiz-adv-x="252" d="M125 12c0,-2 -1,-5 -3,-6 -2,-2 -5,-3 -8,-5 -4,-1 -8,-2 -14,-3 -6,-1 -12,-1 -20,-1 -8,0 -15,0 -21,1 -5,1 -9,2 -12,3 -3,1 -5,3 -6,5 -1,2 -1,4 0,6l121 608c0,2 1,5 4,6 2,2 5,4 9,5 3,1 8,2 13,3 5,1 12,1 20,1 8,0 14,0 19,-1 5,-1 9,-2 13,-3 3,-1 5,-3 6,-5 1,-2 1,-4 0,-6l-121 -608z"/>
                <glyph unicode="L" horiz-adv-x="420" d="M375 56c0,-2 0,-4 -1,-8 0,-4 -1,-8 -2,-12 -1,-4 -2,-8 -3,-13 -1,-4 -3,-8 -5,-12 -2,-4 -4,-7 -7,-9 -3,-2 -6,-4 -9,-4l-279 0c-4,0 -8,0 -11,2 -4,1 -6,3 -9,6 -3,3 -5,6 -5,11 -1,4 -1,10 1,16l117 586c0,2 1,5 4,6 2,2 5,4 8,5 3,1 8,2 14,3 5,1 12,1 20,1 8,0 14,0 20,-1 5,-1 10,-2 12,-3 3,-1 5,-3 6,-5 1,-2 1,-4 0,-6l-109 -547 227 0c4,0 7,-1 9,-4 2,-3 3,-7 3,-12z"/>
                <glyph unicode="N" horiz-adv-x="644" d="M522 35c-1,-7 -3,-12 -6,-17 -3,-5 -6,-8 -10,-11 -4,-3 -8,-5 -12,-6 -4,-1 -9,-2 -13,-2l-32 0c-9,0 -16,1 -22,3 -6,2 -11,5 -15,10 -4,5 -8,11 -12,18 -4,8 -7,17 -11,28l-119 337c-8,24 -16,48 -24,72 -8,24 -16,48 -23,72l-1 0c-4,-27 -9,-53 -14,-80 -5,-26 -10,-53 -15,-79l-73 -368c-1,-3 -2,-5 -4,-7 -2,-2 -5,-3 -8,-5 -4,-1 -8,-2 -13,-3 -5,-1 -12,-1 -19,-1 -8,0 -14,0 -19,1 -5,1 -9,2 -12,3 -2,1 -4,3 -5,5 -1,2 -1,4 0,7l116 583c3,13 8,22 17,28 8,6 17,8 25,8l39 0c8,0 14,-1 20,-2 6,-2 11,-5 15,-9 4,-4 8,-10 11,-17 3,-7 7,-15 11,-25l120 -342c8,-21 15,-42 22,-64 7,-21 14,-43 22,-64l1 0c5,27 9,54 15,83 6,29 11,56 16,83l69 343c1,3 2,5 3,6 2,2 4,3 7,5 3,1 7,2 12,3 5,1 12,1 19,1 7,0 14,0 19,-1 5,0 9,-1 12,-3 3,-1 5,-3 6,-5 1,-2 1,-4 1,-6l-118 -584z"/>
                <glyph unicode="P" horiz-adv-x="516" d="M520 483c0,-17 -2,-35 -6,-54 -4,-19 -10,-37 -19,-56 -9,-18 -20,-35 -34,-51 -14,-16 -30,-30 -49,-43 -19,-13 -41,-22 -66,-29 -25,-7 -55,-11 -88,-11l-87 0 -45 -228c-1,-2 -2,-5 -4,-6 -1,-2 -4,-3 -8,-5 -4,-1 -8,-2 -14,-3 -5,-1 -12,-1 -20,-1 -8,0 -14,0 -19,1 -5,1 -9,1 -12,3 -3,1 -5,3 -6,5 -1,2 -1,4 -1,7l116 584c3,13 8,22 16,28 8,6 18,8 29,8l125 0c16,0 31,0 43,-2 13,-1 25,-3 36,-6 18,-4 34,-10 48,-18 14,-8 26,-18 36,-30 10,-12 17,-26 23,-41 5,-16 8,-33 8,-52zm-89 -9c0,20 -5,38 -15,52 -10,14 -25,25 -46,31 -8,2 -17,4 -26,4 -9,1 -19,1 -30,1l-79 0 -50 -254 80 0c23,0 43,3 59,8 16,5 30,12 42,21 12,9 22,19 31,30 8,11 15,23 20,35 5,12 9,25 12,37 2,13 4,24 4,35z"/>
                <glyph unicode="R" horiz-adv-x="543" d="M519 500c0,-22 -3,-44 -9,-64 -6,-20 -16,-39 -29,-56 -13,-17 -29,-32 -49,-45 -19,-13 -42,-24 -68,-32 17,-6 31,-19 42,-39 11,-20 19,-46 25,-79l26 -140c1,-6 2,-12 3,-17 1,-5 1,-10 1,-14 0,-3 -1,-5 -2,-8 -2,-2 -4,-4 -8,-5 -4,-1 -9,-2 -15,-3 -6,-1 -14,-1 -23,-1 -9,0 -15,0 -21,1 -5,1 -9,2 -12,3 -3,2 -5,4 -6,6 -1,2 -2,6 -3,10l-25 149c-3,17 -6,33 -11,47 -5,14 -11,26 -20,37 -9,10 -19,18 -33,24 -13,6 -29,9 -48,9l-56 0 -54 -270c-1,-2 -2,-4 -4,-6 -1,-2 -4,-3 -8,-5 -4,-1 -8,-2 -14,-3 -6,-1 -13,-1 -20,-1 -8,0 -14,0 -19,1 -5,1 -9,1 -12,3 -3,1 -5,3 -6,5 -1,2 -1,4 -1,7l117 586c3,13 8,21 16,27 8,5 16,7 26,7l138 0c30,0 56,-3 79,-9 23,-6 42,-14 57,-25 15,-11 27,-25 35,-42 8,-16 11,-35 11,-56zm-91 -13c0,11 -2,21 -6,31 -4,9 -10,18 -18,24 -8,7 -19,12 -33,16 -14,4 -30,5 -48,5l-88 0 -43 -213 74 0c29,0 54,4 74,12 20,8 37,18 50,31 13,13 22,27 28,44 6,16 9,33 9,50z"/>
                <glyph unicode="S" horiz-adv-x="452" d="M450 584c0,-3 0,-6 0,-9 0,-4 -1,-7 -2,-11 -1,-4 -2,-8 -3,-12 -1,-4 -3,-8 -4,-11 -2,-3 -4,-6 -6,-7 -2,-2 -5,-3 -7,-3 -4,0 -9,2 -15,6 -6,4 -15,9 -25,14 -10,5 -22,9 -35,14 -14,4 -29,7 -47,7 -20,0 -37,-3 -52,-9 -15,-6 -28,-14 -37,-25 -10,-10 -18,-22 -23,-35 -5,-13 -8,-27 -8,-41 0,-14 3,-27 9,-38 6,-11 15,-20 25,-29 10,-9 22,-17 35,-25 13,-8 27,-16 40,-24 14,-8 27,-17 41,-26 13,-9 25,-20 35,-32 10,-12 19,-26 25,-42 6,-16 9,-34 9,-55 0,-28 -6,-53 -17,-78 -11,-24 -28,-45 -48,-63 -21,-18 -46,-32 -76,-43 -30,-11 -63,-16 -99,-16 -20,0 -38,2 -56,5 -17,3 -33,8 -46,13 -14,5 -25,10 -35,15 -9,5 -16,10 -20,14 -4,4 -6,10 -6,19 0,2 0,5 1,8 0,4 1,7 2,12 1,4 2,8 3,13 1,4 3,8 5,11 2,3 4,6 6,8 2,2 5,3 8,3 5,0 12,-3 19,-8 8,-5 18,-11 29,-17 11,-6 25,-11 41,-17 16,-5 35,-8 56,-8 23,0 43,3 61,9 18,6 33,15 45,26 12,11 22,24 28,38 6,15 10,30 10,47 0,14 -3,27 -9,38 -6,11 -14,21 -24,30 -10,9 -22,17 -35,24 -13,8 -27,15 -40,23 -14,8 -27,17 -40,26 -13,9 -25,20 -35,32 -10,12 -18,26 -25,42 -6,16 -9,34 -9,55 0,26 5,50 15,72 10,22 24,42 43,59 19,17 41,30 67,40 26,10 56,15 88,15 16,0 31,-1 45,-4 14,-3 27,-6 38,-10 11,-4 21,-8 29,-12 8,-4 14,-8 17,-11 3,-3 5,-6 6,-9 1,-3 2,-7 2,-11z"/>
                <glyph unicode="T" horiz-adv-x="487" d="M557 615c0,-2 0,-5 0,-8 0,-4 -1,-7 -2,-11 -1,-4 -2,-8 -3,-12 -1,-5 -3,-8 -5,-12 -2,-3 -4,-6 -7,-8 -3,-2 -6,-3 -9,-3l-178 0 -110 -548c-1,-3 -2,-5 -4,-7 -2,-2 -5,-3 -8,-5 -3,-1 -8,-2 -14,-3 -5,-1 -12,-1 -20,-1 -8,0 -15,0 -20,1 -5,1 -9,2 -12,3 -3,1 -5,3 -6,5 -1,2 -1,4 0,7l109 548 -176 0c-5,0 -8,1 -9,4 -2,3 -2,7 -2,12 0,2 0,5 1,9 0,4 1,7 2,12 1,4 2,8 3,12 1,4 3,8 5,11 2,4 4,6 6,8 2,2 5,3 8,3l440 0c4,0 7,-1 9,-5 2,-3 2,-7 2,-12z"/>
                <glyph unicode="U" horiz-adv-x="641" d="M560 230c-8,-40 -20,-75 -37,-104 -17,-30 -38,-55 -62,-75 -24,-20 -52,-35 -83,-45 -31,-10 -64,-15 -100,-15 -38,0 -71,5 -98,15 -28,10 -50,26 -67,46 -17,20 -28,46 -33,76 -5,30 -4,66 4,106l77 386c0,3 1,5 3,7 2,2 5,4 8,5 4,1 8,2 14,3 5,1 12,1 20,1 8,0 15,0 20,-1 5,-1 9,-2 13,-3 3,-1 5,-3 6,-5 1,-2 1,-4 0,-7l-77 -385c-5,-29 -7,-54 -5,-75 3,-21 9,-39 19,-54 10,-14 24,-25 42,-32 18,-7 39,-11 64,-11 24,0 47,4 68,11 21,8 39,19 55,33 16,14 30,32 41,54 11,21 20,46 25,73l77 386c0,3 1,5 3,7 2,2 4,4 8,5 3,1 8,2 13,3 5,1 12,1 20,1 8,0 14,0 20,-1 5,-1 9,-2 13,-3 3,-1 5,-3 6,-5 1,-2 1,-4 1,-7l-78 -389z"/>
                </font>
                <font id="FontID0" horiz-adv-x="606" font-variant="normal" style="fill-rule:nonzero" font-style="italic" font-weight="700">
                    <font-face 
                        font-family="Calibri">
                        <font-face-src>
                            <font-face-name name="Calibri Bold Italic"/>
                        </font-face-src>
                    </font-face>
                <missing-glyph><path d="M0 0z"/></missing-glyph>
                <glyph unicode="A" horiz-adv-x="606" d="M549 48c2,-12 2,-21 2,-28 0,-7 -2,-12 -7,-15 -5,-3 -12,-5 -22,-6 -10,-1 -24,-1 -41,-1 -13,0 -23,0 -31,1 -8,1 -14,2 -18,3 -4,1 -7,3 -9,6 -2,3 -3,6 -3,11l-17 127 -237 0 -65 -124c-2,-5 -5,-8 -8,-11 -3,-3 -7,-5 -13,-7 -5,-1 -13,-3 -22,-3 -9,-1 -21,-1 -35,-1 -15,0 -27,0 -35,2 -8,1 -14,3 -17,7 -3,4 -3,9 -1,16 2,7 6,16 12,28l306 561c3,6 7,10 10,13 3,4 8,6 14,8 6,2 14,3 25,4 10,0 24,1 41,1 19,0 34,0 45,-1 11,0 20,-2 26,-4 6,-2 10,-5 12,-8 2,-4 3,-9 4,-15l83 -560zm-192 464l0 0 -141 -268 177 0 -36 268z"/>
                <glyph unicode="E" horiz-adv-x="487" d="M515 613c0,-2 0,-5 -1,-10 0,-5 -1,-10 -2,-16 -1,-6 -2,-12 -4,-19 -2,-7 -4,-13 -6,-18 -2,-5 -5,-10 -9,-14 -4,-4 -7,-5 -11,-5l-226 0 -31 -154 191 0c5,0 8,-2 10,-5 2,-3 3,-8 3,-14 0,-2 0,-6 -1,-11 0,-5 -1,-10 -2,-16 -1,-6 -2,-12 -4,-18 -2,-6 -4,-12 -6,-17 -2,-5 -5,-9 -9,-13 -3,-3 -7,-5 -11,-5l-191 0 -36 -178 229 0c4,0 7,-2 9,-5 2,-3 3,-8 3,-15 0,-2 0,-6 0,-11 0,-5 -1,-11 -2,-17 -1,-6 -3,-12 -4,-18 -2,-6 -4,-12 -6,-18 -2,-5 -5,-10 -8,-13 -3,-3 -7,-5 -11,-5l-318 0c-5,0 -10,1 -14,2 -4,2 -8,4 -10,7 -3,4 -5,8 -6,13 -1,5 -1,11 0,18l110 551c3,14 9,25 18,31 9,6 19,9 30,9l314 0c8,0 13,-6 13,-19z"/>
                <glyph unicode="L" horiz-adv-x="422" d="M385 87c0,-2 0,-6 -1,-11 0,-5 -1,-11 -2,-17 -1,-7 -3,-13 -4,-20 -2,-7 -4,-13 -7,-19 -2,-6 -5,-10 -9,-14 -3,-4 -7,-5 -11,-5l-290 0c-5,0 -10,1 -15,2 -5,2 -8,4 -11,7 -3,4 -5,8 -6,13 -1,5 -1,11 0,18l115 575c0,3 2,6 5,9 3,3 7,5 12,6 5,1 12,3 21,4 8,1 19,1 32,1 12,0 23,0 30,-1 8,-1 15,-2 19,-4 5,-2 7,-4 9,-6 1,-3 2,-6 1,-9l-101 -509 200 0c5,0 8,-2 9,-5 2,-4 3,-8 3,-14z"/>
                <glyph unicode="M" horiz-adv-x="874" d="M763 17c-1,-3 -2,-6 -4,-9 -2,-3 -5,-5 -10,-6 -5,-1 -11,-3 -19,-4 -8,-1 -18,-1 -30,-1 -13,0 -23,0 -31,1 -8,1 -14,2 -18,4 -4,2 -7,4 -8,6 -1,3 -1,6 -1,9l103 514 -1 0 -287 -514c-4,-8 -11,-14 -23,-16 -11,-3 -27,-4 -48,-4 -21,0 -36,2 -46,6 -9,4 -14,8 -14,14l-74 515 -1 0 -103 -515c-1,-3 -2,-6 -4,-9 -2,-3 -5,-5 -10,-6 -5,-1 -11,-3 -19,-4 -8,-1 -18,-1 -30,-1 -12,0 -23,0 -30,1 -8,1 -14,2 -18,4 -4,2 -7,4 -8,6 -1,3 -1,6 0,9l112 563c2,8 4,15 8,22 3,6 8,12 13,16 5,5 11,8 17,10 7,2 14,3 21,3l80 0c14,0 27,-1 37,-4 10,-2 18,-7 25,-12 7,-6 12,-14 15,-23 3,-9 6,-21 7,-34l61 -376 2 0 217 376c7,13 13,24 20,33 6,9 14,17 22,23 8,6 17,11 27,13 10,3 21,4 35,4l91 0c8,0 15,-1 21,-3 6,-2 10,-6 14,-10 4,-4 5,-10 6,-16 1,-6 1,-14 -1,-22l-112 -564z"/>
                <glyph unicode="O" horiz-adv-x="668" d="M657 421c0,-29 -3,-59 -8,-92 -5,-33 -14,-65 -25,-97 -12,-32 -27,-63 -46,-92 -19,-29 -42,-55 -69,-77 -27,-22 -59,-40 -95,-54 -37,-13 -78,-20 -125,-20 -39,0 -74,4 -105,13 -30,9 -56,22 -76,41 -21,18 -36,41 -47,69 -11,28 -16,60 -16,98 0,31 3,63 8,96 5,33 14,66 26,98 12,32 28,62 47,92 19,29 42,55 69,77 27,22 59,40 95,52 36,13 77,19 123,19 40,0 74,-5 105,-14 30,-9 55,-23 76,-41 21,-18 36,-42 47,-70 11,-28 16,-61 16,-99zm-136 -12c0,20 -2,38 -7,54 -4,16 -11,30 -21,41 -10,11 -23,20 -38,26 -16,6 -35,9 -58,9 -28,0 -53,-5 -75,-16 -22,-11 -40,-25 -56,-43 -16,-18 -29,-38 -40,-60 -11,-23 -19,-46 -26,-69 -7,-23 -11,-46 -14,-68 -3,-22 -4,-42 -4,-58 0,-20 2,-38 7,-54 4,-16 11,-29 22,-40 10,-11 23,-19 38,-25 16,-6 35,-9 59,-9 28,0 53,5 74,16 21,11 40,25 56,42 16,18 29,37 40,60 11,23 19,45 26,68 6,23 11,46 14,68 3,22 4,42 4,59z"/>
                <glyph unicode="P" horiz-adv-x="532" d="M547 477c0,-18 -2,-37 -6,-57 -4,-20 -11,-39 -20,-58 -9,-19 -21,-37 -36,-54 -14,-17 -32,-32 -53,-45 -21,-13 -46,-24 -73,-31 -28,-8 -60,-11 -98,-11l-66 0 -40 -202c-1,-3 -2,-6 -5,-9 -3,-3 -7,-5 -12,-6 -6,-1 -13,-3 -21,-4 -9,-1 -19,-1 -31,-1 -12,0 -22,0 -30,1 -8,1 -14,2 -19,4 -5,2 -7,4 -9,6 -2,2 -2,5 -1,9l114 569c3,15 9,27 19,35 10,8 22,11 36,11l138 0c17,0 32,0 46,-2 13,-1 27,-3 40,-6 20,-4 38,-10 54,-18 16,-8 29,-18 40,-31 11,-12 19,-27 25,-43 6,-16 9,-35 9,-56zm-135 -14c0,16 -4,29 -11,41 -8,11 -19,19 -35,24 -7,2 -14,4 -23,5 -9,1 -18,1 -28,1l-57 0 -43 -215 59 0c19,0 35,2 48,7 13,4 25,10 35,17 10,7 19,16 26,26 7,10 13,20 17,31 5,11 8,22 9,33 2,11 3,21 3,32z"/>
                <glyph unicode="R" horiz-adv-x="563" d="M555 494c0,-21 -3,-42 -9,-62 -6,-21 -15,-40 -27,-58 -12,-18 -28,-35 -48,-50 -20,-15 -44,-26 -72,-35 16,-6 29,-19 40,-37 11,-18 20,-44 26,-75l25 -128c1,-7 3,-14 4,-19 1,-6 1,-11 1,-15 0,-3 -1,-6 -3,-8 -2,-2 -6,-4 -12,-6 -6,-1 -13,-2 -23,-3 -10,-1 -22,-1 -37,-1 -13,0 -24,0 -33,1 -8,1 -14,2 -19,4 -5,2 -8,4 -9,7 -1,3 -3,6 -3,10l-24 140c-3,16 -6,31 -11,43 -4,12 -10,23 -17,31 -7,8 -15,14 -25,19 -10,4 -22,6 -36,6l-41 0 -48 -241c-1,-3 -2,-6 -5,-9 -3,-3 -6,-5 -12,-6 -5,-1 -12,-3 -21,-4 -8,-1 -19,-1 -31,-1 -13,0 -23,0 -31,1 -8,1 -14,2 -19,4 -5,2 -7,4 -9,6 -2,2 -2,5 -1,9l115 575c3,14 8,25 17,31 9,6 19,9 31,9l170 0c30,0 57,-3 81,-8 24,-5 44,-14 61,-25 17,-12 30,-26 39,-43 9,-17 14,-38 14,-61zm-138 -24c0,9 -2,18 -5,26 -3,8 -8,15 -15,21 -7,6 -16,10 -27,13 -11,3 -24,5 -39,5l-73 0 -36 -180 61 0c24,0 45,3 62,10 17,7 31,16 41,27 10,11 18,23 23,37 5,14 7,27 7,41z"/>
                <glyph unicode="S" horiz-adv-x="465" d="M469 583c0,-3 0,-6 -1,-11 0,-5 -1,-10 -2,-16 -1,-6 -2,-12 -4,-18 -2,-6 -3,-11 -6,-17 -2,-5 -5,-9 -7,-13 -3,-3 -5,-5 -9,-5 -5,0 -10,2 -17,6 -7,4 -15,9 -25,13 -10,5 -22,9 -35,13 -13,4 -28,6 -45,6 -18,0 -32,-3 -45,-7 -12,-5 -22,-11 -30,-19 -8,-8 -14,-17 -17,-27 -4,-10 -6,-20 -6,-30 0,-12 3,-22 9,-31 6,-9 14,-17 23,-25 10,-8 21,-15 34,-22 12,-7 25,-15 38,-22 13,-8 26,-16 38,-26 12,-9 24,-20 33,-32 10,-12 18,-26 23,-42 6,-16 9,-34 9,-55 0,-30 -6,-59 -19,-85 -12,-26 -30,-49 -53,-68 -23,-19 -50,-34 -82,-46 -32,-11 -68,-17 -107,-17 -21,0 -41,2 -59,5 -18,3 -34,8 -47,12 -14,5 -25,10 -35,16 -9,5 -16,10 -21,15 -5,5 -7,12 -7,22 0,3 0,7 1,12 1,5 2,11 3,17 1,6 2,12 4,19 2,6 4,12 6,17 2,5 5,9 8,13 3,3 6,5 9,5 5,0 12,-3 20,-8 8,-5 17,-11 29,-17 11,-6 25,-12 41,-17 16,-5 34,-8 56,-8 19,0 36,2 51,7 14,5 27,12 37,20 10,9 17,18 22,29 5,11 8,23 8,37 0,12 -3,23 -9,32 -6,9 -14,18 -23,25 -9,8 -21,15 -33,22 -12,7 -25,14 -37,22 -13,8 -25,16 -37,25 -12,9 -23,20 -33,32 -10,12 -17,26 -23,42 -6,16 -9,34 -9,56 0,29 6,56 17,81 12,25 28,46 49,64 21,18 46,32 75,42 29,10 61,15 95,15 17,0 32,-1 47,-4 15,-3 28,-5 40,-9 12,-4 22,-8 31,-13 9,-5 14,-8 18,-11 3,-3 6,-6 7,-10 1,-3 2,-8 2,-13z"/>
                <glyph unicode="U" horiz-adv-x="652" d="M585 233c-8,-40 -21,-76 -38,-106 -17,-31 -39,-56 -64,-77 -26,-20 -55,-36 -89,-46 -33,-10 -70,-15 -111,-15 -43,0 -80,5 -111,16 -31,11 -55,26 -73,47 -18,21 -29,47 -35,78 -5,32 -4,68 5,109l75 375c1,3 2,6 5,9 3,3 6,5 12,6 5,2 12,3 21,4 8,1 19,1 32,1 12,0 22,0 30,-1 8,-1 14,-2 19,-4 5,-2 8,-4 9,-6 1,-3 2,-6 1,-9l-75 -375c-5,-25 -7,-47 -5,-65 2,-18 8,-33 17,-45 9,-12 20,-21 35,-27 15,-6 32,-9 53,-9 21,0 40,3 58,9 18,6 33,16 47,28 14,12 25,27 35,45 9,18 17,38 21,60l76 378c1,3 2,6 5,9 2,3 6,5 11,6 5,2 12,3 20,4 8,1 19,1 31,1 12,0 22,0 30,-1 8,-1 14,-2 19,-4 5,-2 7,-4 9,-6 1,-3 2,-6 1,-9l-77 -381z"/>
                <glyph unicode="Ç" horiz-adv-x="518" d="M213 -4c-39,8 -71,22 -95,44 -24,21 -42,47 -53,77 -11,30 -17,65 -17,104 0,30 3,62 9,95 6,33 15,65 28,96 13,31 28,61 48,89 19,28 42,53 68,74 26,21 56,38 89,50 33,12 70,19 111,19 23,0 45,-2 65,-7 21,-5 38,-11 54,-19 15,-8 26,-15 32,-21 6,-6 9,-14 9,-24 0,-9 -1,-21 -5,-37 -3,-15 -7,-28 -12,-37 -5,-9 -10,-14 -16,-14 -4,0 -9,3 -15,8 -6,5 -14,11 -23,17 -9,6 -22,12 -36,17 -15,5 -33,8 -55,8 -24,0 -46,-5 -66,-15 -20,-9 -38,-22 -53,-38 -16,-16 -29,-34 -41,-55 -12,-21 -22,-42 -29,-64 -8,-22 -13,-44 -17,-66 -4,-22 -6,-42 -6,-61 0,-23 3,-43 8,-60 6,-17 14,-32 25,-43 11,-11 24,-20 40,-26 16,-6 33,-9 53,-9 23,0 43,2 59,7 16,5 30,10 42,16 12,6 21,11 29,16 8,5 15,7 19,7 5,0 8,-1 10,-5 2,-3 3,-7 3,-13 0,-2 0,-6 -1,-10 -1,-5 -1,-10 -2,-15 -1,-6 -2,-12 -3,-19 -1,-7 -3,-13 -5,-19 -1,-6 -4,-11 -5,-16 -2,-5 -5,-9 -9,-12 -4,-4 -11,-9 -22,-15 -11,-6 -27,-12 -47,-19 -20,-6 -43,-10 -69,-13l6 -23c2,-8 4,-16 5,-23 1,-7 2,-14 2,-21 0,-18 -3,-33 -9,-46 -6,-13 -14,-23 -24,-32 -10,-8 -23,-14 -37,-18 -14,-4 -30,-6 -48,-6 -9,0 -19,0 -27,1 -9,1 -17,2 -25,3 -8,2 -14,3 -20,5 -6,2 -11,4 -15,5 -4,2 -6,4 -7,6 -1,2 -2,5 -2,9 0,3 0,8 1,14 1,6 2,12 4,18 2,6 5,11 8,15 4,5 8,7 13,7l56 0c5,0 9,0 13,2 4,1 8,3 11,5 3,2 5,5 7,9 2,4 3,8 3,12 0,3 0,7 -1,11 0,4 -1,9 -2,13l-10 40z"/>
                <glyph unicode="Õ" horiz-adv-x="668" d="M657 421c0,-29 -3,-59 -8,-92 -5,-33 -14,-65 -25,-97 -12,-32 -27,-63 -46,-92 -19,-29 -42,-55 -69,-77 -27,-22 -59,-40 -95,-54 -37,-13 -78,-20 -125,-20 -39,0 -74,4 -105,13 -30,9 -56,22 -76,41 -21,18 -36,41 -47,69 -11,28 -16,60 -16,98 0,31 3,63 8,96 5,33 14,66 26,98 12,32 28,62 47,92 19,29 42,55 69,77 27,22 59,40 95,52 36,13 77,19 123,19 40,0 74,-5 105,-14 30,-9 55,-23 76,-41 21,-18 36,-42 47,-70 11,-28 16,-61 16,-99zm-136 -12c0,20 -2,38 -7,54 -4,16 -11,30 -21,41 -10,11 -23,20 -38,26 -16,6 -35,9 -58,9 -28,0 -53,-5 -75,-16 -22,-11 -40,-25 -56,-43 -16,-18 -29,-38 -40,-60 -11,-23 -19,-46 -26,-69 -7,-23 -11,-46 -14,-68 -3,-22 -4,-42 -4,-58 0,-20 2,-38 7,-54 4,-16 11,-29 22,-40 10,-11 23,-19 38,-25 16,-6 35,-9 59,-9 28,0 53,5 74,16 21,11 40,25 56,42 16,18 29,37 40,60 11,23 19,45 26,68 6,23 11,46 14,68 3,22 4,42 4,59zm20 390c0,3 1,5 3,6 1,2 4,3 7,4 3,1 7,2 12,2 5,0 11,0 18,0 14,0 24,-1 28,-3 5,-2 7,-5 7,-9 0,-2 0,-6 -1,-12 -1,-7 -2,-14 -5,-23 -2,-9 -6,-18 -11,-28 -5,-10 -11,-19 -20,-28 -9,-8 -19,-15 -32,-21 -13,-5 -29,-8 -48,-8 -17,0 -32,2 -45,7 -13,5 -24,11 -34,17 -10,6 -20,11 -28,17 -9,5 -18,7 -28,7 -11,0 -19,-3 -25,-9 -6,-6 -9,-15 -10,-26 -1,-3 -2,-5 -3,-6 -2,-2 -4,-3 -7,-4 -3,-1 -7,-1 -12,-2 -5,0 -11,-1 -18,-1 -14,0 -24,1 -29,3 -5,2 -7,5 -7,11 0,3 0,8 1,15 1,7 3,15 6,24 3,9 7,18 12,27 5,9 12,18 21,26 9,8 19,14 32,19 13,5 28,8 46,8 17,0 32,-3 45,-8 12,-5 24,-11 34,-17 10,-6 19,-12 28,-17 9,-5 18,-8 27,-8 10,0 18,3 24,8 6,5 10,15 11,28z"/>
                </font>
                <style type="text/css">
                <![CDATA[
                    @font-face { font-family:"Calibri";font-variant:normal;font-style:italic;font-weight:normal;src:url("#FontID1") format(svg)}
                    @font-face { font-family:"Calibri";font-variant:normal;font-style:italic;font-weight:bold;src:url("#FontID0") format(svg)}
                    .fil2 {fill:#4B60A4}
                    .fil1 {fill:#D7812C}
                    .fil0 {fill:#D7812C;fill-rule:nonzero}
                    .fnt1 {font-style:italic;font-weight:normal;font-size:56px;font-family:'Calibri'}
                    .fnt0 {font-style:italic;font-weight:bold;font-size:56px;font-family:'Calibri'}
                    .fnt2 {font-style:italic;font-weight:bold;font-size:56px;font-family:'Calibri'}
                ]]>
                </style>
                </defs>
                <g id="Camada_x0020_1">
                <metadata id="CorelCorpID_0Corel-Layer"/>
                <g id="_2251362817584">
                <path class="fil0" d="M647 234l-52 196 59 0 53 -196 -59 0z"/>
                <path class="fil0" d="M886 296l-18 69c-1,4 -4,6 -8,6l-111 0 21 -78 114 0c2,0 3,0 3,0 0,0 0,0 0,1 0,0 0,1 0,2zm20 -62l-182 0c0,0 -44,161 -51,192 -8,42 28,81 82,73 -44,-24 -18,-69 -18,-69l123 0c32,0 53,-18 62,-53l24 -88 0 0c1,-5 1,-11 1,-15 0,-18 -7,-39 -42,-39z"/>
                <path class="fil0" d="M787 126c-25,38 -78,31 -102,31 -12,0 -20,6 -23,18l-5 20 0 0c-1,3 -1,5 -1,7 0,4 2,14 16,14 0,0 52,6 84,-18 36,-26 31,-72 31,-71z"/>
                <path class="fil0" d="M630 234l-59 0 -11 43c-8,31 -35,62 -80,93 -21,-23 -31,-47 -31,-70 0,-7 1,-14 3,-21l12 -45 -59 0 -9 33c-5,18 -7,35 -7,50 0,44 19,82 55,111l1 1 42 0 1 -1c35,-20 64,-43 86,-70 22,-27 38,-57 47,-90l9 -36z"/>
                <text x="385" y="578"  class="fil1 fnt0">SOLUÇÕES </text>
                <text x="635" y="578"  class="fil2 fnt1">INTELIGENTES</text>
                <text x="440" y="656"  class="fil2 fnt1">PARA SUA</text>
                <text x="664" y="656"  class="fil1 fnt1"> </text>
                <text x="676" y="656"  class="fil1 fnt2">EMPRESA</text>
                </g>
                </g>
                </svg>
            </div>
@endsection
