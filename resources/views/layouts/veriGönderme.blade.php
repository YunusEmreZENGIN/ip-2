<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veri Gönderme</title>
</head>
<body>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    
    <div id="filter-container">
      <label>Ürün:
        <input type="text" id="filter-product">
      </label>
      <label>Miktar:
        <input type="number" id="filter-quantity">
      </label>
      <button id="apply-filters">Filtrele</button>
    </div>
    
    <table id="example" class="display">
      <thead>
        <tr>
          <th>Ürün</th>
          <th>Miktar</th>
        </tr>
      </thead>
      <tbody>
        <tr><td>Tişört</td><td>150</td></tr>
        <tr><td>Pantolon</td><td>300</td></tr>
        <tr><td>Ayakkabı</td><td>50</td></tr>
        <tr><td>Ceket</td><td>200</td></tr>
      </tbody>
    </table>
    
    <script>
      $(document).ready(function () {
        const table = $("#example").DataTable();
    
        $("#apply-filters").on("click", function () {
          const productFilter = $("#filter-product").val().toLowerCase();
          const quantityFilter = parseInt($("#filter-quantity").val());
    
          table.rows().every(function () {
            const data = this.data();
            const matchesProduct = data[0].toLowerCase().includes(productFilter);
            const matchesQuantity = !quantityFilter || parseInt(data[1]) >= quantityFilter;
    
            if (matchesProduct && matchesQuantity) {
              $(this.node()).show();
            } else {
              $(this.node()).hide();
            }
          });
        });
      });
    </script>
    
</body>
</html>
