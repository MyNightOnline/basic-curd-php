// Define an array to store the product data
var products = []

// Function to add a new product
function addProduct() {
  // Get the input field values
  var number = document.getElementById("number").value
  var image = document.getElementById("image").value
  var productName = document.getElementById("product-name").value
  var price = document.getElementById("price").value

  // Create a new product object
  var product = {
    number: number,
    image: image,
    productName: productName,
    price: price,
  }

  // Add the product to the array
  products.push(product)

  // Clear the input fields
  document.getElementById("number").value = ""
  document.getElementById("image").value = ""
  document.getElementById("product-name").value = ""
  document.getElementById("price").value = ""

  // Refresh the product table
  refreshTable()
}

// Function to refresh the product table
function refreshTable() {
  var table = document.getElementById("product-table")

  // Clear the existing table rows
  while (table.rows.length > 1) {
    table.deleteRow(1)
  }

  // Add the products to the table
  for (var i = 0; i < products.length; i++) {
    var product = products[i]

    var row = table.insertRow(i + 1)

    var numberCell = row.insertCell(0)
    numberCell.innerHTML = product.number

    var imageCell = row.insertCell(1)
    imageCell.innerHTML =
      "<img src='" + product.image + "' alt='Product Image' width='50'>"

    var productNameCell = row.insertCell(2)
    productNameCell.innerHTML = product.productName

    var priceCell = row.insertCell(3)
    priceCell.innerHTML = product.price

    var actionCell = row.insertCell(4)
    actionCell.innerHTML =
      "<button class='button' onclick='editProduct(" +
      i +
      ")'>Edit</button> <button class='button' onclick='deleteProduct(" +
      i +
      ")'>Delete</button>"
  }
}

// Function to edit a product
function editProduct(index) {
  // Get the product at the specified index
  var product = products[index]

  // Set the input field values
  document.getElementById("number").value = product.number
  document.getElementById("image").value = product.image
  document.getElementById("product-name").value = product.productName
  document.getElementById("price").value = product.price

  // Remove the product from the array
  products.splice(index, 1)

  // Refresh the product table
  refreshTable()
}

// Function to delete a product
function deleteProduct(index) {
  // Remove the product from the array
  products.splice(index, 1)

  // Refresh the product table
  refreshTable()
}
