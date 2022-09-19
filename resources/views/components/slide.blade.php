<style>
    .slider {

        width: 95%;
        height: 400px;
        margin: auto;
        overflow: hidden;

    }


    .slider ul {

        display: flex;
        padding: 0;
        width: 300%;


        animation: cambio 20s infinite alternate;

    }


    .slider li {
        width: 100%;
        list-style: none;

    }

    .slider img {
        width: 100%;
        height: 400px;
        border-radius: 10px;
    }

    @keyframes cambio {

        0% { margin-left: 0; }
        35% { margin-left: 0; }

        40% { margin-left: -100% }
        75% { margin-left: -100% }

        80% { margin-left: -200% }
        100% { margin-left: -200% }


    }
</style>




<div class="container py-8">


    <div class="slider">

        <ul>
            <li><img src="{{ asset('img/slide1.png') }}" alt=""></li>
            <li><img src="{{ asset('img/slide2.png') }}" alt=""></li>
            <li><img src="{{ asset('img/slide3.png') }}" alt=""></li>

        </ul>

    </div>
</div>
