<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Notice Board</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
  <style>
    #example_wrapper {
      margin-top: 30px;
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- back to home -->
    <a href="index.html" id="back">Back to Home</a>
    <!-- end of back to home -->
    <table id="example" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>Sl.No.</th>
          <th>Notifications</th>
          <th>Time & Date</th>
        </tr>
      </thead>
      <tbody id="table-body">
      </tbody>
      <tfoot></tfoot>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    let notice;

    $.ajax({
      url: "./api/getPosts.php",
      method: "GET",
      success: function(data) {
        let notice = JSON.parse(data);
        notice.map((item) => {
          let tr = document.createElement('tr');
          let td1 = document.createElement('td');
          let td2 = document.createElement('td');
          let td3 = document.createElement('td');
          td1.innerHTML = item["id_no"];
          td2.innerHTML = item["message"];
          td3.innerHTML = item["time"];
          tr.append(td1, td2, td3);
          document.getElementById('table-body').append(tr);

        });
        $("#example").DataTable();


      }
    });
  </script>
</body>

</html>