<!DOCTYPE html>
<html>

<head><?php wp_head() ?></head>

<body class="error">
    <span>
        <?php echo get_page_by_path("404-error")->post_content; ?>
    </span>
    <header>
        <?php get_template_part("templates/entablature") ?>
    </header>
    <div class="column">
        <div class="CAPITAL">
            <div></div>
            <div></div>
        </div>
        <div class="shaft">
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="column">
        <div class="CAPITAL">
            <div></div>
            <div></div>
        </div>
        <div class="shaft">
            <div></div>
            <div></div>
        </div>
    </div>
    <?php wp_footer() ?>
</body>
<style>
    :root {
        --pL: #bababa;
        --p: #a4a4a4;
        --pD: #8d8d8d;
        --rL: #bababa;
        --r: #a4a4a4;
        --rD: #8d8d8d;
    }

    @layer second {

        html,
        body {
            min-width: 100vw;
            min-height: 100vh;
            overflow: hidden;
        }

        body {
            background-color: var(--bL);
        }

        header {
            grid-template-rows: 1fr !important;
            z-index: 3;
            min-width: 100vw;
            position: absolute;
            bottom: 0vh;
            overflow: hidden;
        }

        .BG {
            width: 100vw;
            height: 100vh;
            position: absolute;
            z-index: 1;
        }

        .roof,
        .roof img {
            background-color: var(--Gd);
            border-color: var(--Gd);
        }

        .error>.column {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr 10fr;
            height: 100vh;
            width: 33vw;
            justify-content: center;
            position: fixed;
            z-index: 2;
        }

        .error>.column>.CAPITAL {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 3fr 1fr;
            justify-self: center;
            width: 50vw;

        }

        .error>.column>.CAPITAL>div {
            border-bottom-left-radius: 5vw;
            border-bottom-right-radius: 5vw;
        }

        .error>.column>.CAPITAL>:first-child {
            background-color: var(--rD);
            width: 100%;
            justify-self: center
        }

        .error>.column>.CAPITAL>:last-child {
            background-color: var(--r);
            width: 70%;
            justify-self: center;
        }

        .error>.column>.shaft {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr;
            width: 27vw;
            justify-self: center;
        }

        .error>.column>.shaft>div {
            background: linear-gradient(to right, var(--shaftgrad));
        }

        .error>.column>.shaft>:nth-child(2) {
            transform: scaleX(-1);
        }

        @media (orientation: portrait) {
            .error>.column:nth-last-of-type(1) {
                transform: translateY(30vh) translateX(-15vw);
            }

            .error>.column:nth-last-of-type(2) {
                transform-origin: top center;
                transform: translateY(38vh) translateX(22vw) rotateZ(-20deg);
            }

            .error>span {
                top: 25vh;
                right: 0px;
            }

            .entablature {
                box-sizing: content-box;
                transform-origin: bottom center;
                transform: rotate(4deg) translateY(3vh) scaleX(1.5) scaleY(1);
            }
        }

        @media (orientation: landscape) {
            .error>.column:nth-last-of-type(1) {
                transform-origin: top center;
                transform: translateY(50vh) translateX(33vw) rotateZ(60deg) scaleX(0.5) scaleY(1.5);
            }

            .error>.column:nth-last-of-type(2) {
                transform-origin: bottom center;
                transform: translateY(40vh) translateX(66vw) rotateZ(-30deg) scaleX(0.5) scaleY(1.5);
            }

            .error>span {
                top: 25vh;
                right: 0px;
            }

            header {
                position: fixed;
                box-sizing: content-box;
                transform-origin: top center;
                transform: translateX(25vw) translateY(15vh) rotateZ(-10deg);
            }
        }

        .error>span {
            position: absolute;
            width: 40vw;
            z-index: 100;
            font-size: clamp(2rem,1.8vw,10rem);
            -webkit-text-stroke: 1px black;
        }

        /*stiles for svg sun on BG*/
        .SUN,
        .cloud {
            filter: blur(0.3rem);
        }
    }
</style>

</html>