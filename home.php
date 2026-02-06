<html>
<!DOCTYPE html>

<head>
  <?php wp_head(); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <div>
    <?php get_header(); ?>
    <div class="main proportionized">
      <div></div>
      <div>
        <div class="navbar">
          <input title="to return to home page click logo on top" name="search">
        </div>
        <div class="result" num="10">
          <?php get_template_part("templates/postloop", null, ["offset" => "0", "search" => "", "quantity" => null]) ?>
        </div>
      </div>
      <div></div>

    </div>
    <?php get_footer(); ?>
  </div>

  <?php wp_footer(); ?>
</body>
<style>
  .navbar input[name="search"] {
    border: none;
    background-color: var(--gD);
    border-radius: 5px;
    height: 48%;
    width: 95%;
    text-align: center;
    color: white;
    margin-top: 1.6%;
  }

  .navbar {
    max-height: 20vh;
  }
</style>

</html>
