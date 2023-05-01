$(document).ready(function () {
  $(document).on("click", ".column_sort", function () {
    var column_name = $(this).attr("id");
    var order = $(this).data("order");
    $.ajax({
      url: "sort.php",
      method: "POST",
      data: { column_name: column_name, order: order },
      success: function (data) {
        $("#movieTable").html(data);
      },
    });
  });
});

// Example
