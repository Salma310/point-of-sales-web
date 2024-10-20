<!DOCTYPE html>
<html>
<head>
    <title>Sales Transactions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4CAF50;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input, button {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: calc(100% - 22px);
            margin-top: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            color: #555;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        #total-amount {
            margin-top: 20px;
            text-align: right;
        }
        #total-amount h2 {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sales Transactions</h1>

        <!-- Form to Add New Item -->
        <form id="sales-form">
            <div class="form-group">
                <label for="item">Nama Item:</label>
                <input type="text" id="item" name="item" required>
            </div>
            <div class="form-group">
                <label for="price">Harga:</label>
                <input type="number" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="quantity">Jumlah:</label>
                <input type="number" id="quantity" name="quantity" min="1" required>
            </div>
            <button type="submit">Add Item</button>
        </form>

        <!-- Table to Display Added Items -->
        <table id="sales-table">
            <thead>
                <tr>
                    <th>Nama Item</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table rows will be inserted here by JavaScript -->
            </tbody>
        </table>

        <!-- Total Amount Display -->
        <div id="total-amount">
            <h2>Jumlah Total: Rp<span id="total">0.00</span></h2>
        </div>
    </div>

    <script>
        document.getElementById('sales-form').addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Get form values
            const itemName = document.getElementById('item').value;
            const price = parseFloat(document.getElementById('price').value);
            const quantity = parseInt(document.getElementById('quantity').value);
            const total = price * quantity;

            // Create a new row in the table
            const tableBody = document.getElementById('sales-table').getElementsByTagName('tbody')[0];
            const newRow = tableBody.insertRow();

            newRow.insertCell().textContent = itemName;
            newRow.insertCell().textContent = price.toFixed(2);
            newRow.insertCell().textContent = quantity;
            newRow.insertCell().textContent = total.toFixed(2);

            // Update total amount
            const totalAmountElement = document.getElementById('total');
            const currentTotal = parseFloat(totalAmountElement.textContent);
            totalAmountElement.textContent = (currentTotal + total).toFixed(2);

            // Clear form fields
            document.getElementById('sales-form').reset();
        });
    </script>
</body>
</html>
