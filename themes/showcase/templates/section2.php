<section id="section2">

  <div class="section-content">

    <h2>Super Retina XDR display</h2>
    <h3>Behold OLED.</h3>

    <div class="box"></div>

  </div>

</section>

<style>


#section2 {
  background-color: #AECBD9;
  padding: 60px 0 694px 0;
  box-sizing: border-box;
  margin: 75px 0;
}

#section2 .section-content {
  max-width: 1120px;
  margin: 0 auto;
}

#section2 .box {
  background-image: url('<?php echo get_template_directory_uri(); ?>/assets/display_super_retina__e3n6rzz3cru6_large.jpg');
  width: 2612px;
  height: 594px;
  margin-left: 1700px;
  margin-top: 50px;
}

#section2 h2 {
  font-size: 3.5em;
  color: #3948B1;
}

#section2 h3 {
  font-size: 3.5em;
}

</style>

<script>

  gsap.from(".box",
    {
      scrollTrigger: {
        trigger: "#section2",
        start: "top 150px",
        end: "+=4000",
        scrub: 2,
        pin: true,
        markers: true
      },
      display: 'none',
      x: -2000,
      duration: 10
    }
  );

</script>
