<div class="capital proportionized">
    <div>
        <div></div>
        <div></div>
    </div>
    <div></div>
    <div>
        <div></div>
        <div></div>
    </div>

</div>
<style>
        /*code to 'DRAW' capitals*/
        .capital {
            display: grid;
            
            grid-template-rows: 1fr;
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
    </style>