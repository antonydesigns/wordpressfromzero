jQuery().ready(($) => {
  $(".button").click(() => {
    console.log($("form"));
    $("form")[1].reset();
  });
});
