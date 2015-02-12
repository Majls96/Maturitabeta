<div class="slideshow">
    <img class="jedna" src="image/nikelogo.jpg"/>

    <img src="image/usain.jpg"/>
    <img src="image/adida.jpg"/>
</div>
<script>
    $(document).ready(function(  ) {

        jQuery('.slideshow img:gt(0)').hide();

        setInterval(function() {
            jQuery('.slideshow :first-child')
                    .fadeTo(2000, 0)
                    .next('img')
                    .fadeTo(2000, 1)
                    .end()
                    .appendTo('.slideshow');


        }, 4000);
    });
</script>