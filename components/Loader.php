<div class="loader-container" style="display: none;">
    <div class="loader">
    </div>
    <p id="l-text">Loading</p>
</div>

<style>
    .loader-container {
        display: none;
        opacity: 0;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 10px;
        color: white;
        background-color: rgba(0, 0, 0, .6);
        z-index: 100;
    }

    .loader {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        position: relative;
        animation: rotate 1s linear infinite
    }

    .loader::before {
        content: "";
        box-sizing: border-box;
        position: absolute;
        inset: 0px;
        border-radius: 50%;
        border: 5px solid #FFF;
        animation: prixClipFix 2s linear infinite;
    }

    @keyframes rotate {
        100% {
            transform: rotate(360deg)
        }
    }

    @keyframes prixClipFix {
        0% {
            clip-path: polygon(50% 50%, 0 0, 0 0, 0 0, 0 0, 0 0)
        }

        25% {
            clip-path: polygon(50% 50%, 0 0, 100% 0, 100% 0, 100% 0, 100% 0)
        }

        50% {
            clip-path: polygon(50% 50%, 0 0, 100% 0, 100% 100%, 100% 100%, 100% 100%)
        }

        75% {
            clip-path: polygon(50% 50%, 0 0, 100% 0, 100% 100%, 0 100%, 0 100%)
        }

        100% {
            clip-path: polygon(50% 50%, 0 0, 100% 0, 100% 100%, 0 100%, 0 0)
        }
    }
</style>

<script>
    const loader = document.querySelector('.loader-container');

    function showLoadingScreen(text) {
        loader.style.display = 'flex';
        loader.style.opacity = '1';
        loader.style.animation = 'appear .25s';
        if (text) {
            document.getElementById('l-text').innerHTML = text;
        }
    }



    // HIDE LOADING SCREEN
    // *******************
    function hideLoadingScreen() {
        setTimeout(() => {
            loader.style.display = 'none';
        }, 250);
        loader.style.opacity = '0';
        loader.style.animation = 'disappear .25s';
    }
</script>