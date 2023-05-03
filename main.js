$(document).ready(function () {
  $(document).on("click", ".product-review-btn", function () {
    var snackID = $(this).data("snack-id");
    window.location.href = "review.php?snackID=" + snackID;
  });

  $(document).on("click", ".snack-page-btn", function () {
    console.log("clicked");
    var snackID = $(this).data("snack-id");
    window.location.href = "snack.php?snackID=" + snackID;
  });
});
