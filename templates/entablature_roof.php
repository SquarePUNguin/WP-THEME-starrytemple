<div class="roof">
    <div>
        <?php if (has_custom_logo()) {
            $logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
            $logo=$logo[0];
        } else {
            $logo=get_template_directory_uri()."/assets/img/home.svg";
        } ?>
        <?php
        echo "<a href=" . get_permalink(get_page_by_path('front-Page')) . "><img src=" . $logo . "></a>";
        ?>
    </div>
    <style>
        /*code to 'DRAW' fancy named roof*/

        @layer main {
            .roof a {
                text-align: center;
            }

            .roof {
                clip-path: polygon(0% 100%, 0% 55%, 50% 0%, 100% 55%, 100% 100%);
                background-color: var(--rL);

            }

            .roof>div {
                clip-path: polygon(0% 100%, 0% 60%, 50% 5%, 100% 60%, 100% 100%);
                background-color: var(--pD);
                display: flex;
                justify-content: center;
            }

            @media (max-width:1000px) {
                .roof {
                    clip-path: polygon(0% 100%, 0% 30%, 50% 0%, 100% 30%, 100% 100%);
                    background-color: var(--rL);

                }

                .roof>div {
                    clip-path: polygon(0% 100%, 0% 35%, 50% 5%, 100% 35%, 100% 100%);
                    background-color: var(--pD);
                    display: flex;
                    justify-content: center;
                }
            }

            @media (max-width:550px) {
                .roof {
                    clip-path: polygon(0% 100%, 0% 20%, 50% 0%, 100% 20%, 100% 100%);
                    background-color: var(--rL);

                }

                .roof>div {
                    clip-path: polygon(0% 100%, 0% 25%, 50% 5%, 100% 25%, 100% 100%);
                    background-color: var(--pD);
                    display: flex;
                    justify-content: center;
                }
            }

            @media (max-width:300px) {
                .roof {
                    clip-path: polygon(0% 100%, 0% 10%, 50% 0%, 100% 10%, 100% 100%);
                    background-color: var(--rL);

                }

                .roof>div {
                    clip-path: polygon(0% 100%, 0% 15%, 50% 5%, 100% 15%, 100% 100%);
                    background-color: var(--pD);
                    display: flex;
                    justify-content: center;
                }
            }

            .roof>div a:has(img) {
                text-align: center;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            .roof>div a>img {
                box-sizing: border-box;
                border-radius: 100%;
                border: 0.4vw var(--rL) solid;
                width:9vw;
                margin:3vw;
            }
        }
    </style>
</div>