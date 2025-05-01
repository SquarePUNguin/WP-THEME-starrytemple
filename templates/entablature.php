<div class="entablature proportionized">
    <div></div>
    <?php get_template_part(slug: "templates/entablature_roof")?>
    <div></div>
    <div></div>
    <style>
        header {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 10fr 2fr;
        }

        /*code to 'DRAW' capitals*/
        .capital {
            display: grid;
            
            grid-template-rows: 1fr;
            max-height: 100.6px;
        }

        .capital>:first-child,
        .capital>:last-child {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 3fr 1fr;
        }

        .capital>:not(:nth-child(2))>:first-child {
            background-color: var(--rD);

            border-bottom-right-radius: 2vw;
        }

        .capital>:not(:nth-child(2))>:last-child {
            background-color: var(--r);
            border-bottom-right-radius: 2vw;
            width: 9vw;
        }

        .capital>:last-child {
            transform: scaleX(-1);
        }

        .entablature {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr 4fr 1fr 1fr;
        }
        .entablature>:nth-child(3) {
            background-color: var(--p);
        }

        .entablature>:nth-child(4) {
            background-color: var(--pL);
        }
    </style>
</div>