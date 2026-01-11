<div id="hamb" class="space-y-1 menu-toggler">

    @for ($i = 0; $i < 3; $i++)
        <span class="line block w-4 h-[2px] transition duration-300"></span>
    @endfor

</div>

<style>
    #hamb span.line {
        background: currentColor;
    }
    #hamb:not(.is-active) .line:nth-child(2) {
        opacity: 100;
    }
    #hamb.is-active .line:nth-child(2) {
        opacity: 0;
        /* display: none; */
    }

    #hamb.is-active .line:nth-child(1) {
        transform-origin: top left;
        -webkit-transform:  rotate(48deg);
        -ms-transform:  rotate(48deg);
        -o-transform:  rotate(48deg);
        transform:  rotate(48deg);
    }

    #hamb.is-active .line:nth-child(3) {
        transform-origin: bottom left;
        -webkit-transform:  rotate(-48deg);
        -ms-transform:  rotate(-48deg);
        -o-transform:  rotate(-48deg);
        transform:  rotate(-48deg);
    }
</style>
<script>
    document.getElementById('hamb').addEventListener('click', function () {
        this.classList.toggle('is-active');
    });
</script>