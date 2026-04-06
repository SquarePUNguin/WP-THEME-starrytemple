<footer>
    <div class="base">
        <div>
            <div>
            </div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div>
        </div>
        <div>
            <div>
            </div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="sterobate">
        <div></div>
        <div><?php wp_nav_menu(['theme_location'=>"Footer"]) ?></div>
    </div>
    <style>
        footer {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr 6fr;
        }

        .base {
            display: grid;
            grid-template-columns: 8vw 1fr 8vw;
            grid-template-rows: 1fr;
        }

        .base>:not(:nth-child(2)) {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 0.5vw repeat(5 ,1fr);
        }
        .base>:not(:nth-child(2))>:nth-child(even){
            background: var(--rD);
            width:8.5vw;
            border-top-right-radius: 0.5vw;
            border-bottom-right-radius: 0.5vw;
        }
        .base>:not(:nth-child(2))>:nth-child(odd){
            width:8vw;
            background: radial-gradient(circle at 100% 100%,
                    transparent 0.5vw,
                    var(--r) 0.5vw,
                    var(--r) 100%);
        }
        .base>:not(:nth-child(2))>:first-child {
            width:8vw;
            background: radial-gradient(circle at 100% 0%,
                    transparent 0.5vw,
                    var(--r) 0.5vw,
                    var(--r) 100%);
        }
        
        .base>:nth-child(3){
            transform: scaleX(-1);
        }

        .sterobate {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr 4fr;
        }

        .sterobate>:nth-child(1) {
            background: linear-gradient(var(--rD)50%, var(--r)50%, var(--r)100%);
        }

        .sterobate>:nth-child(2) {
            background: var(--rL);
        }
    </style>
</footer>