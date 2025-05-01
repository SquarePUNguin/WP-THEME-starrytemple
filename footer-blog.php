<footer>
    <div>

        <?php
        if (comments_open()) {
            comments_template();
        } else {
        }
        ?><br><?php
        wp_nav_menu([
            'theme_location' => 'Footer',
            'container' => false,
            'menu_class' => 'footer-menu',
            'menu_id' => '',
            'echo' => true,
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        ]); ?>
    </div>
    <style>
        footer{
            background: linear-gradient(to top, var(--bD) 50%, rgba(22,0,93,0.5058356106114321) 100%); 
            box-shadow: 0px 0px 30px 30px rgba(22,0,93,0.5058356106114321);
        }
        footer>div{
            --fmarg:2vw;
            margin-left: var(--fmarg);
            margin-right:var(--fmarg);
        }
    </style>
</footer>