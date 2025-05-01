<header>

    <?php
    get_template_part(slug: "templates/entablature_roof");
    get_template_part(slug: "templates/capital");
    ?>
    <div class="proportionized shafts">
        <div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div>
            <div class="navbar">
                <h1><?php the_title() ?></h1>
            </div>
        </div>
        <div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="linnavbar">
    <?php wp_nav_menu([
						'theme_location' => 'Header',
						'container' => 'div',
						'menu_class' => 'navbar-menu',
						'menu_id' => '',
						'echo' => true,
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					]); ?>
    </div>
    <style>
        @layer third {
            .roof {
                transform: scale(-1, -1);
                position: absolute;
                min-width: 100%;
                z-index: 2;
            }

            .roof a {
                transform: scale(-1, -1);
            }

            .capital {
                margin-top: 12vh;
                min-height: 112px;
            }

            .shafts {
                min-height: 50vh;
                border: none;
            }

            .shafts>:not(:nth-child(2)) {
                background: none;
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                grid-template-rows: 1fr;
            }

            .shafts>:not(:nth-child(2))>:not(:nth-child(1)) {
                border-bottom-right-radius: 5vw;
            }

            .shafts>:not(:nth-child(2))>:nth-child(1) {
                background-color: var(--rL);
                border-bottom-right-radius: none;
            }

            .shafts>:not(:nth-child(2))>:nth-child(2) {
                background-color: var(--r);
                height: 90%;
            }

            .shafts>:not(:nth-child(2))>:nth-child(3) {
                background-color: var(--rD);
                height: 80%;
            }

            .navbar {
                border: none;
                text-align: center;
                justify-content: center;
                height: 66%;
            }

            .navbar>h1 {
                padding-top: 2vh;
                font-size: clamp(1rem,4vw,10rem);
            }
            .linnavbar{
                background-color: var(--rL);
                overflow-x: scroll;
                padding-left: 2vw;
                padding-right:1.5vw;
                border-bottom-left-radius:  25px;
                border-bottom-right-radius: 25px;
            }
            .linnavbar ul{
                margin:0px;
                text-align: center;
                text-wrap: nowrap;
                overflow-x: scroll;
                padding:0px;
                padding-top: 1vh;
                padding-bottom:1vh;

            }
            .linnavbar :visited{
                color:white;
            }
        }
    </style>
</header>