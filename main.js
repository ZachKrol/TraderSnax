$(document).ready(function () {
  $(document).on("click", ".product-review-btn", function () {
    console.log("hello");
    var snackID = $(this).data("snack-id");
    window.location.href = "review.php?id=" + snackID;
  });

  // $(document).on("click", "snack-page-btn", function () {
  //   var snackID = $(this).data("snack-id");
  //   window.location.href = ">>>>SNACKPAGEGOESHERE<<<<.php?id=" + snackID;
  // });
});
