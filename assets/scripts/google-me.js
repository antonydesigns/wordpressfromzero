jQuery().ready(($) => {
  console.log("I wanna do some magic");
  $("#name").on("keypress", (e) => {
    if (e.which != 13) {
      return;
    }
    var name = $("#name").val();
    console.log(name);

    $.ajax({
      url: ajax.ajaxurl,
      data: {
        action: "google_me",
        name: name,
      },
      success: (response) => {
        $("#describe").empty().append(response);
        console.log(response);
      },
      error: (err) => {
        console.log(err);
      },
    });
  });
});
